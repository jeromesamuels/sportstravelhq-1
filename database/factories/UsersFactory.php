<?php

use App\Models\Core\Users;

$factory->define(Users::class, function (Faker\Generator $faker, $attrs) {
    $password = $attrs['password'] ?? 'secret';

    $account_type = $attrs['account_type'] ?? '';
    $group_id = $attrs['group_id'] ?? 0;

    if (is_callable($group_id)) {
        $group_id = $group_id();
    }

    if ($account_type === 'coordinator') {

    }

    $email = $faker->unique()->safeEmail;
    $phone = $faker->phoneNumber;
    $organization_name = $attrs['organization_name'] ?? $faker->company;

    return [
        'group_id' => $group_id,
        'username' => $email,
        'email' => $email,
        'phone_number' => $phone,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'active' => 1,
        'o_name' => $organization_name,
        'address' => $faker->streetAddress,
        'state' => 'Florida',
        'city' => $faker->city,
        'zip' => $faker->postcode,
        'password' => bcrypt($password),
        'remember_token' => str_random(10),
    ];
});
