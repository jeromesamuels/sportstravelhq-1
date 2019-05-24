<?php

namespace Tests\Feature;

use App\Models\Core\Groups;
use App\Models\Core\Users;
use App\User;
use Tests\TestCase;

class ClientLoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLoginPage()
    {
        $response = $this->get('/user/login');

        $response->assertSuccessful();
        $response->assertViewIs('user.login');
    }

    /**
     * See if a client can login.
     *
     * @return void
     */
    public function testClientCanLogIn()
    {
        $password = 'admin123';

        $user = factory(User::class)->create(
            [
                'vcode' => 1,
                'password' => bcrypt($password),
                'group_id' => Groups::TRAVEL_COORDINATOR,
            ]
        );

        $postData      = [
            'email'    => $user->email,
            'password' => $password,
        ];

        $response = $this->post('/user/signin', $postData);

        $response->assertSessionDoesntHaveErrors();

        $response->assertRedirect('/client');
        $this->assertAuthenticatedAs($user);

    }
}
