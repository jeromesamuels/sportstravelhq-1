<?php

use App\Models\hotelamenities;
use Faker\Generator as Faker;

$factory->define(App\Models\TripAmenity::class, function (Faker $faker, $attributes) {
    $amenity = Hotelamenities::inRandomOrder()->first();
    return [
        'trip_id' => $attributes['trip_id'],
        'amenity_id' => $amenity->id,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
    ];
});
