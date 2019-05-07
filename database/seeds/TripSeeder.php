<?php

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

        factory(App\Models\Usertrips::class, 10)
            ->create(
                [
                    'entry_by' => 3,
                ]
            )
            ->each(
                function (App\Models\Usertrips $trip) use ($faker) {
                    $trip_amenities = factory(App\Models\TripAmenity::class, $faker->numberBetween(1, 3))->create(
                        [
                            'trip_id' => $trip->id,
                        ]
                    );
                }
            );
    }
}
