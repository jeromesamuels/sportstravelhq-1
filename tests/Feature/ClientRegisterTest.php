<?php

namespace Tests\Feature;

use Tests\TestCase;

class ClientRegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRegistration()
    {
        $faker = \Faker\Factory::create();

        $email = $faker->email;

        $response = $this->post(
            //'/user/register',
            '/user/create',
            [
                'o_name'                => $faker->company,
                'username'              => $email,
                'firstname'             => $faker->firstName,
                'lastname'              => $faker->lastName,
                'address'               => $faker->streetAddress,
                'city'                  => $faker->city,
                'state'                 => 'Miami',
                'zip'                   => $faker->postcode,
                'email'                 => $email,
                'phone'                 => $faker->phoneNumber,
                'password'              => 'admin123',
                'password_confirmation' => 'admin123',
            ]
        );

        $response->assertSessionDoesntHaveErrors();

        dd(session());

        $response->assertStatus(302);
    }
}
