<?php

use App\User;

$factory->define(User::class, function (Faker\Generator $faker, $attrs) {
    $password = $attrs['password'] ?? 'secret';

    $account_type = $attrs['account_type'] ?? '';
    $group_id     = $attrs['group_id'] ?? 0;
    $hotel_id     = $attrs['hotel_id'] ?? 0;
    $vcode        = $attrs['vcode'] ?? 0;

    if (is_callable($group_id)) {
        $group_id = $group_id();
    }

    switch ($account_type) {
    case 'coordinator':
    case 'subcoordinator':
        $organization_name = $attrs['organization_name'] ?? $faker->company;
        break;
    case 'super_admin':
    case 'admin':
    case 'corporate':
    case 'manager':
    default:
        $organization_name = '';
        break;
    }

    $email             = $faker->unique()->safeEmail;
    $phone             = $faker->phoneNumber;

    if ($account_type === 'manager' && !$hotel_id) {

    }

    return [
        'group_id'       => $group_id,
        'hotel_id'       => $hotel_id,
        'vcode'          => $vcode,
        'username'       => $email,
        'email'          => $email,
        'phone_number'   => $phone,
        'first_name'     => $faker->firstName,
        'last_name'      => $faker->lastName,
        'active'         => 1,
        'o_name'         => $organization_name,
        'address'        => $faker->streetAddress,
        'state'          => 'Florida',
        'city'           => $faker->city,
        'zip'            => $faker->postcode,
        'password'       => bcrypt($password),
        'remember_token' => str_random(10),
    ];
});
