<?php

namespace Tests\Feature;

use App\Models\Core\Groups;
use App\Models\Rfp;
use App\Models\UserTrip;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HotelManagerPlaceBid extends TestCase
{
    use WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = User::where('group_id', Groups::HOTEL_MANAGER)->first();
        $this->actingAs($user);


        //-- Get a trip this hotel manager has not submitted a bid to yet
        $trip = UserTrip::whereHas('rfps', function ($query) use ($user) {
            $query->where('user_id', '!=', $user->id);
        })->first();

        if ($trip) {
            $check_in = Carbon::parse($trip->check_in);
            $valid_date = $check_in->subDays(3);
            $response = $this->post(
                '/hotelmanager/submitBid',
                [
                    'trip_id'           => $trip->id,
                    'offer_rate'        => $this->faker()->numberBetween(100, 2000),
                    'eventDistance'     => $this->faker()->numberBetween(10, 200),
                    'offerValidityDate' => $valid_date->format('Y-m-d'),
                    'message'           => $this->faker()->paragraph,
                ]
            );

            $response->assertSessionHas('success');
            $response->assertStatus(302);
        } else {
            dd(':( no trips to bid on!');
        }
    }
}
