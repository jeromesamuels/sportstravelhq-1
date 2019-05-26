<?php

namespace Tests\Feature;

use App\Models\Core\Groups;
use App\User;
use Tests\TestCase;

class ClientBookHotel extends TestCase
{
    /**
     * Test booking a single location trip
     *
     * @return void
     * @throws \Exception
     */
    public function testBookSingleLocationAsManager()
    {
        $data = $this->randomBooking();

        $user = User::where('group_id', Groups::TRAVEL_COORDINATOR)->first();
        $this->actingAs($user);

        $response = $this->post('/usertrips', $data);

        $response->assertSessionHas('status', 'success');
        $response->assertStatus(302);
    }
    /**
     * Test booking a single location trip
     *
     * @return void
     * @throws \Exception
     */
    public function testBookSingleLocationAsSubCoordinator()
    {
        $data = $this->randomBooking();

        $user = User::where('group_id', Groups::SUB_COORDINATOR)->first();
        $this->actingAs($user);

        $response = $this->post('/usertrips', $data);

        $response->assertSessionHas('status', 'success');
        $response->assertStatus(302);
    }

    /**
     * Prepare data for a random booking
     *
     * @return array
     * @throws \Exception
     */
    public function randomBooking(): array
    {
        $faker = \Faker\Factory::create();

        $check_in  = $faker->dateTimeBetween('+1 month', '+2 month');
        $check_out = clone $check_in;
        $check_out->add(new \DateInterval('P1D'));

        $data = [
            'id'               => 0,
            'trip_name'        => $faker->realText(),
            'from_address_1'   => $faker->streetAddress,
            'from_state_id'    => 'Florida',
            'from_city'        => $faker->city,
            'from_zip'         => $faker->postcode,
            'to_address_1'     => '',
            'to_state_id'      => '',
            'to_city'          => '',
            'to_zip'           => '',
            'check_in'         => $check_in->format('m/d/Y'),
            'check_out'        => $check_out->format('m/d/Y'),
            'budget_from'      => 70,
            'budget_to'        => 350,
            'double_queen_qty' => 2,
            'double_king_qty'  => 3,
            'trip_amenities'   => [1, 3],
            'service_type'     => '1',
            'comment'          => $faker->paragraph,
            'added'            => null,
            'status'           => null,
            'submit'           => null,
            'action_task'      => 'public',
        ];

        return $data;
    }
}
