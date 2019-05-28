<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BaseUserSeeder::class);
        $this->call(HotelAmenitiesSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(ModuleSeeder::class);
        $this->call(GroupAccessSeeder::class);
        $this->call(PagesSeeder::class);
        $this->call(TripStatusSeeder::class);
        $this->call(TripSeeder::class);
    }
}
