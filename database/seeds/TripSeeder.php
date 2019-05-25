<?php

use App\Models\Core\Groups;
use App\Models\Rfp;
use App\Models\TripAmenity;
use App\Models\TripstatusSettings;
use App\Models\UserTrip;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $coordinator_id = 747;

        //-- First Create
        $trips = factory(UserTrip::class, 25)
            ->create(['entry_by' => $coordinator_id]);

        //-- THEN integrate over each!
        $trips->each(
                function (UserTrip $trip) use ($coordinator_id, $faker) {
                    //-- Add some amenities to the trip requirements
                    $trip_amenities = factory(TripAmenity::class, $faker->numberBetween(1, 3))->create(
                        [
                            'trip_id' => $trip->id,
                        ]
                    );

                    //-- Add RFPs ... maybe
                    if ($faker->boolean) {
                        $manager_group = Groups::where('name', 'Hotel Manager')->first();
                        $manager = User::where('group_id', $manager_group->group_id)->inRandomOrder()->first();
                        $rfp     = factory(Rfp::class, $faker->numberBetween(1, 3))->create(
                            [
                                'user_id'      => $manager->id,
                                'user_trip_id' => $trip->id,
                                'check_in'     => (new Carbon($trip->check_in)),
                                'check_out'    => (new Carbon($trip->check_out)),
                            ]
                        );

                        //-- If the trip has one or more RFPs change trip status?
                        $trip_status  = TripstatusSettings::where('title', 'Bid Sent');
                        $trip->status = $trip_status->first()->id;
                        $trip->save();
                    }

                }
            );
    }
}
