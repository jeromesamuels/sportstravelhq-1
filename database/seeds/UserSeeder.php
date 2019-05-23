<?php

use App\Models\Core\Groups;
use App\Models\Core\Users;
use App\Models\Organization;
use App\Models\TripAmenity;
use App\Models\UserTrip;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $coord_id      = Groups::where('name', 'Travel Coordinator')->first()->group_id;
        $subcoord_id   = Groups::where('name', 'Subcoordinator')->first()->group_id;
        $organizations = factory(Organization::class, 1)->create();

        /**
         * The organization created
         *
         * @var Organization $organization
         */
        $organization = $organizations[0];

        //-- First Create
        $users = factory(Users::class, 10)
            ->create(
                [
                    'password' => 'admin123',
                    'group_id' => function () use ($subcoord_id, $coord_id, $faker) {
                        return $faker->boolean ? $coord_id : $subcoord_id;
                    },
                ]
            );

        $users->each(
            function (Users $user) use ($faker, $organization) {
                //-- Add user to org
                $organization->users()->attach($user->id);

                //-- First Create
                $trips = factory(UserTrip::class, 10)
                    ->create(['entry_by' => $user->id]);

                //-- THEN integrate over each!
                $trips->each(
                    function (UserTrip $trip) use ($user, $faker) {
                        //-- Add some amenities to the trip requirements
                        $amenity_count  = $faker->numberBetween(1, 3);
                        $trip_amenities = factory(TripAmenity::class, $amenity_count)
                            ->create(
                                [
                                    'trip_id' => $trip->id,
                                ]
                            );
                    }
                );
            }
        );

        //.... query here
        dump($organization->coordinators->count());
        dump($organization->subcoordinators->count());
    }
}
