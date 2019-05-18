<?php

use App\Models\Sximo\Menu;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPreferencesLinkMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $preference = Menu::where('menu_name', 'Preferences')->first();
        if ($preference) {
            $preference->url = url('client/preferences/index');
            $preference->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $preference = Menu::where('menu_name', 'Preferences')->first();
        if ($preference) {
            $preference->url = '';
            $preference->save();
        }
    }
}
