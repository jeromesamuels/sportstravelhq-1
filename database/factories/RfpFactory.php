<?php

use App\Models\HotelAmenities;
use App\Models\Rfp;
use Faker\Generator as Faker;

$factory->define(Rfp::class, function (Faker $faker, $attrs) {
    $statuses = array_values(Rfp::STATUSES);
    $check_in = $attrs['check_in'] ??
                $faker->dateTimeBetween('+2 months', '+4 months');
    $check_out = $attrs['check_out'] ?? (clone $check_in)->add(new DateInterval('P1D'));
    $offer_validity = (clone $check_in)->sub(new DateInterval('P2D'));

    $amenities = Hotelamenities::inRandomOrder()->get();
    $amenities_ids = $amenities->pluck('id')->all();


    return [
        'user_trip_id'      => $attrs['user_trip_id'],
        'user_id'           => $attrs['user_id'] ?? 4,
        'added'             => new Carbon\Carbon(),
        //'status'            => $faker->randomElement($statuses),
        'status'            => Rfp::STATUS_BID_SENT,
        'destination'       => $faker->city,
        'hotel_information' => 0,
        'distance_event'    => 31.44,
        'offer_rate'        => 127,
        'cc_authorization'  => $faker->boolean ? 1 : 0,
        'offer_validity'    => $offer_validity->format('Y-m-d'),
        'check_in'          => $check_in->format('Y-m-d'),
        'check_out'         => $check_out->format('Y-m-d'),
        'sales_manager'     => $faker->name,
        'king_beedrooms'    => $faker->numberBetween(0, 5),
        'queen_beedrooms'   => $faker->numberBetween(0, 5),
        'amenitie_ids'      => json_encode($amenities_ids),
        'ramount'           => 0,
        'receipt'           => '',
        'hotels_message'    => $faker->paragraph,
        'decline_reason'    => '',
        'team'              => '',
        'roster'            => '',
    ];
});
