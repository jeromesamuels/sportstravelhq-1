<?php

namespace Tests\Feature;

use App\Models\Core\Groups;
use App\Notifications\SendTwoFactorVerificationCode;
use App\User;
use Illuminate\Support\Facades\Notification;
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
        $faker    = \Faker\Factory::create();
        $response = $this->get('/user/login');

        $response->assertSuccessful();
        $response->assertViewIs('user.login');
    }

    /**
     * See if a client can login.
     *
     * @return void
     */
    public function testClientCanLogInVerified()
    {
        $password = 'admin@123';

        $user = factory(User::class)->create(
            [
                'vcode'    => 1,
                'password' => bcrypt($password),
                'group_id' => Groups::TRAVEL_COORDINATOR,
            ]
        );

        $postData = [
            'email'    => $user->email,
            'password' => $password,
        ];

        $response = $this->post('/user/signin', $postData);

        $response->assertSessionDoesntHaveErrors();
        $response->assertRedirect('/client');
        $this->assertAuthenticatedAs($user);

    }

    /**
     * See if a client can login.
     *
     * @return void
     */
    public function testClientCanLogInNotVerified()
    {
        Notification::fake();

        $password = 'admin@123';

        $user = factory(User::class)->create(
            [
                'vcode'    => 0,
                'password' => bcrypt($password),
                'group_id' => Groups::TRAVEL_COORDINATOR,
            ]
        );

        $postData = [
            'email'    => $user->email,
            'password' => $password,
        ];

        $response = $this->post('/user/signin', $postData);

        $response->assertSessionDoesntHaveErrors();

        $code = '';
        Notification::assertSentTo(
            [$user],
            SendTwoFactorVerificationCode::class,
            function (SendTwoFactorVerificationCode $notice) use (&$code) {
                $code = $notice->getCode();

                return true;
            }
        );

        $response->assertRedirect('/user/login/code');

        $response = $this->post(
            '/user/signin',
            [
                'code'      => $code,
                'send_code' => 1,
                'user_id'   => $user->id,
                'email'     => $user->email,
                'password'  => $password,
            ]
        );

        $response->assertStatus(302);
        $response->assertRedirect('/client');
        $this->assertAuthenticatedAs($user);
    }
}
