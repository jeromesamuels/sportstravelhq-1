<?php

use App\Models\Core\Groups;
use App\Models\Organization;
use App\Models\TripAmenity;
use App\Models\UserTrip;
use App\User;
use Illuminate\Database\Seeder;

class BaseUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $super_id      = Groups::where('name', 'Superadmin')->first()->group_id;
        $admin_id      = Groups::where('name', 'Administrator')->first()->group_id;
        $corp_id      = Groups::where('name', 'Corporate')->first()->group_id;
        $hotel_id      = Groups::where('name', 'Hotel Manager')->first()->group_id;
        $coord_id      = Groups::where('name', 'Travel Coordinator')->first()->group_id;
        $subcoord_id   = Groups::where('name', 'Subcoordinator')->first()->group_id;

        $users = [
            [
                'id' => 1,
                'account_type' => 'super_admin',
                'group_id' => $super_id,
                'username' => 'superadmin',
                'password' => 'admin@123',
                'email' => 'superadmin@usdevco.com',
                'phone_number' => '3053008807',
                'first_name' => 'Root',
                'last_name' => 'Admin',
                'vcode' => 1,
            ],
            [
                'id' => 2,
                'account_type' => 'admin',
                'group_id' => $admin_id,
                'username' => 'admin',
                'password' => 'admin@123',
                'email' => 'admin@usdevco.com',
                'phone_number' => '3053008807',
                'first_name' => 'Eric',
                'last_name' => 'Admin',
                'vcode' => 1,
            ],
            [
                'id' => 3,
                'account_type' => 'coordinator',
                'group_id' => $coord_id,
                'username' => 'coordinator',
                'password' => 'admin@123',
                'email' => 'coordinator@usdevco.com',
                'phone_number' => '3053008807',
                'first_name' => 'Eric',
                'last_name' => 'Coordinator',
                'vcode' => 1,
            ],
            [
                'id' => 4,
                'account_type' => 'manager',
                'group_id' => $hotel_id,
                'username' => 'manager',
                'password' => 'admin@123',
                'email' => 'manager@usdevco.com',
                'phone_number' => '3053008807',
                'first_name' => 'Eric',
                'last_name' => 'Manager',
                'vcode' => 1,
            ],
            [
                'id' => 5,
                'account_type' => 'corporate',
                'group_id' => $corp_id,
                'username' => 'corporate',
                'password' => 'admin@123',
                'email' => 'corporate@usdevco.com',
                'phone_number' => '3053008807',
                'first_name' => 'Eric',
                'last_name' => 'Corporate',
                'vcode' => 1,
            ],
        ];

        foreach ($users as $user_data) {
            $user = new User();

            $user->id = $user_data['id'];
            $user->group_id = $user_data['group_id'];
            $user->username = $user_data['username'];
            $user->password = bcrypt($user_data['password']);
            $user->email = $user_data['email'];
            $user->phone_number = $user_data['phone_number'];
            $user->first_name = $user_data['first_name'];
            $user->last_name = $user_data['last_name'];
            $user->vcode = $user_data['vcode'];
            $user->save();

            if ($user_data['account_type'] === 'coordinator') {
                $organizations = factory(Organization::class, 1)->create();
                $organization = $organizations[0];

                $user->organizations()->attach($organization->id);
            }
        }
    }
}
