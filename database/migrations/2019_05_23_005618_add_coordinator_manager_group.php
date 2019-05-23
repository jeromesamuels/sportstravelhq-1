<?php

use App\Models\Core\Groups;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCoordinatorManagerGroup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $group = new Groups();
        $group->group_id = 7;
        $group->name = 'Subcoordinator';
        $group->description = 'Subcoordinators can see everything except other coordinators';
        $group->level = 7;
        $group->save();

        Schema::create('organizations', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name', 255);

            $table->timestamps();

            //-- Lookup indexes
            $table->index(['name']);
        });

        Schema::create('organization_user', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('organization_id');

            $table->timestamps();

            //-- Lookup indexes
            $table->index(['user_id', 'organization_id']);
            $table->index(['user_id']);
            $table->index(['organization_id']);
        });

        Schema::table('tb_users', function (Blueprint $table) {
            $table->unsignedBigInteger('organization_id');

            $table->index(['organization_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Groups::where('group_id', 7)->delete();
        Schema::dropIfExists('organizations');
        Schema::dropIfExists('organization_user');
        Schema::table('tb_users', function (Blueprint $table) {
            $table->dropColumn('organization_id');
        });
    }
}
