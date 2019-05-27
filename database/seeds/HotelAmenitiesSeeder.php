<?php

use App\Models\Core\Groups;
use App\Models\Organization;
use App\Models\TripAmenity;
use App\Models\UserTrip;
use App\User;
use Illuminate\Database\Seeder;

class HotelAmenitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        INSERT INTO `hotel_amenities` (`id`, `title`, `slug`, `disabled`) VALUES
        (1, 'Free Breakfast', 'free-breakfast', 0),
        (2, 'Free Wifi', 'free-wifi', 0),
        (3, 'Free Parking', 'free-parking', 0),
        (4, 'Sleeper Sofa', 'sleeper_sofa', 0),
        (5, 'Gym', 'gym', 0),
        (6, 'Airport Pickup', 'airport-pickup', 0),
        (8, 'Dining', 'dining', 0),
        (9, 'Meeting Room ', 'Meeting Room ', 0),
        (10, 'Pool', 'pool', 0);
        */

        $hotel_amenities = [
            ['id' => 1, 'title' => 'Free Breakfast', 'slug' => 'free-breakfast',  'disabled' => 0],
            ['id' => 2, 'title' => 'Free Wifi', 'slug' => 'free-wifi',  'disabled' => 0],
            ['id' => 3, 'title' => 'Free Parking', 'slug' => 'free-parking',  'disabled' => 0],
            ['id' => 4, 'title' => 'Sleeper Sofa', 'slug' => 'sleeper_sofa',  'disabled' => 0],
            ['id' => 5, 'title' => 'Gym', 'slug' => 'gym',  'disabled' => 0],
            ['id' => 6, 'title' => 'Airport Pickup', 'slug' => 'airport-pickup',  'disabled' => 0],
            ['id' => 8, 'title' => 'Dining', 'slug' => 'breakfast',  'disabled' => 0],
            ['id' => 9, 'title' => 'Meeting Room', 'slug' => 'Meeting Room ',  'disabled' => 0],
            ['id' => 10, 'title' => 'Pool', 'slug' => 'pool',  'disabled' => 0],
        ];

        foreach ($hotel_amenities as $amenity_data) {
            $amenity = new \App\Models\HotelAmenities();
            $amenity->id = $amenity_data['id'];
            $amenity->title = $amenity_data['title'];
            $amenity->slug = $amenity_data['slug'];
            $amenity->disabled = $amenity_data['disabled'];
            $amenity->save();
        }

    }
}
