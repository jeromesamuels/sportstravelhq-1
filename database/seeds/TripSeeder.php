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
     * The coordinator to seed
     *
     * @var int
     */
    private $_coordinator_id;

    /**
     * The number of trips to create
     *
     * @var int
     */
    private $_trip_count;

    /**
     * TripSeeder constructor.
     *
     * @param int $coordinator_id The person creating the trips
     * @param int $trip_count     The number of trips to create
     */
    public function __construct($coordinator_id = 3, $trip_count = 100)
    {
        $this->_coordinator_id = $coordinator_id;
        $this->_trip_count     = $trip_count;
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        //-- First Create
        $trips = factory(UserTrip::class, $this->_trip_count)
            ->create(['entry_by' => $this->_coordinator_id]);

        //-- THEN integrate over each!
        $trips->each(
            function (UserTrip $trip) use ($faker) {
                //-- Add some amenities to the trip requirements
                $amenity_count = $faker->numberBetween(1, 3);

                $trip_amenities = factory(TripAmenity::class, $amenity_count)
                    ->create(
                        [
                            'trip_id' => $trip->id,
                        ]
                    );

                //-- Add RFPs ... maybe
                if ($faker->boolean) {
                    $bid_count = $faker->numberBetween(1, 3);

                    $manager_group = Groups::where('name', 'Hotel Manager')->first();

                    $group_id = $manager_group->group_id;

                    $manager = User::where('group_id', $group_id)
                        ->inRandomOrder()
                        ->first();

                    $rfp = factory(Rfp::class, $bid_count)->create(
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
