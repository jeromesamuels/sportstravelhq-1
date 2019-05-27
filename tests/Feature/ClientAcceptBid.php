<?php

namespace Tests\Feature;

use App\Models\Core\Groups;
use App\Models\Rfp;
use App\Models\TripstatusSettings;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use TripSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClientAcceptBid extends TestCase
{
    use WithFaker;
//    use RefreshDatabase;


    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testClientAcceptBid()
    {
        /**
         * @var \App\User $user
         */
        $user = User::where('group_id', Groups::TRAVEL_COORDINATOR)->first();
        $this->actingAs($user);

        $tripSeeder = new TripSeeder($user->id, 5);
        $tripSeeder->run();

        $trip_status = TripstatusSettings::where('title', 'Bid Sent')->first();

        //-- Get all user trips that have no accepted bids
        $trips = $user->trips()->where('status', $trip_status->id)
            //-- Make sure this trip has bids submitted
            ->whereHas(
                'rfps',
                function ($query) {
                    //-- Make sure the trip has no selected bids, or anything
                    // else further.
                    $query->where('status', Rfp::STATUS_PENDING);
                }
            )->get();

        $this->assertNotEquals($trips->count(), 0);

        $trip = $trips->first();

        $rfp  = $trip->rfps()->first();

        $response = $this->post('/acceptRFP/' . $rfp->id);

        $response->assertStatus(200);

        $response->assertJson(
            [
                'success' => true,
            ]
        );

        //-- Lets make sure the agreement was created!
        $hotelAgreement = $rfp->hotelAgreement;
        $this->assertNotEquals($hotelAgreement->id, 0);


        //-- Make sure everything was linked
        $this->assertNotEquals($hotelAgreement->user_trip_id, 0);
        $this->assertNotEquals($hotelAgreement->travel_coordinator_id, 0);
        $this->assertNotEquals($hotelAgreement->hotel_manager_id, 0);
        $this->assertNotEquals($hotelAgreement->hotel_id, 0);
        $this->assertNotEquals($hotelAgreement->rfp_id, 0);
    }
}
