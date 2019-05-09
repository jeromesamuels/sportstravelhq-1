<?php

use App\Models\UserTrip;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(UserTrip::class, function (Faker $faker, $attrs) {
    $city = $faker->city;

    $check_in = $faker->dateTimeBetween('+2 months', '+4 months');
    $check_out = clone $check_in;
    $check_out->add(new DateInterval('P1D'));

    $data = [
        'entry_by'         => $attrs['entry_by'] ?? 3,
        'trip_name'        => $faker->company . ' ' . $city,
        "from_address_1"   => "{$faker->streetAddress}, {$city}, FL, USA",
        "from_city"        => $city,
        "from_state_id"    => "FL",
        "from_zip"         => "32830",
        "to_address_1"     => "",
        "to_city"          => "",
        "to_state_id"      => 0,
        "to_zip"           => "",
        "check_in"         => $check_in->format('m/d/Y'),
        "check_out"        => $check_out->format('m/d/Y'),
        "budget_from"      => 70,
        "budget_to"        => 350,
        "double_queen_qty" => 3,
        "double_king_qty"  => 5,
        "amenity_ids"      => "",
        "comment"          => $faker->paragraph,
        "added"            => (new Carbon())->format('Y-m-d H:i:s'),
        "status"           => 0,
        "invoice_status"   => 0,
    ];

    return $data;
});
