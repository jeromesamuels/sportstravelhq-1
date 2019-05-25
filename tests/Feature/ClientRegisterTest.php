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

        $this->app['config']->set('sximo.cnf_activation', false);
        $this->app['config']->set('cnf_activation', false);


        $email = $faker->email;

        $response = $this->post(
            //'/user/register',
            '/user/create',
            [
                'user_type'             => 2, //-- Client
                'o_name'                => $faker->company,
                'username'              => $email,
                'firstname'             => $faker->firstName,
                'lastname'              => $faker->lastName,
                'address'               => $faker->streetAddress,
                'city'                  => $faker->city,
                'state'                 => 'Miami',
                'zip'                   => $faker->postcode,
                'email'                 => $email,
                'phone'                 => '760-' . $faker->numberBetween(400, 999) . '-' . $faker->numberBetween(1000, 9999),
                'password'              => 'admin123',
                'password_confirmation' => 'admin123',
            ]
        );

        $response->assertSessionDoesntHaveErrors();

        $response->assertStatus(302);
    }
}
