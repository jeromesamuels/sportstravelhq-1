<?php

use App\Models\Core\Groups;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SaveGroupIdToGroups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $groups = [
            [
                'group_id' => 1,
                'name' => 'Superadmin',
                'description' => 'Root Superadmin , should be as top level groups',
                'level' => 1,
            ],
            [
                'group_id' => 2,
                'name' => 'Administrator',
                'description' => 'Administrator level, level No 23',
                'level' => 2,
            ],
            [
                'group_id' => 3,
                'name' => 'Users',
                'description' => 'Users as registered / member',
                'level' => 3,
            ],
            [
                'group_id' => 4,
                'name' => 'Travel Coordinator',
                'description' => 'Travel Coordinator',
                'level' => 4,
            ],
            [
                'group_id' => 5,
                'name' => 'Hotel Manager',
                'description' => 'Hotel Manager',
                'level' => 5,
            ],
            [
                'group_id' => 6,
                'name' => 'Corporate',
                'description' => 'Corporate',
                'level' => 6,
            ],
            [
                'group_id' => 7,
                'name' => 'Subcoordinator',
                'description' => 'Subcoordinators can see everything except other coordinators',
                'level' => 7,
            ],
        ];

        foreach ($groups as $group_data) {
            $group              = new Groups();
            $group->group_id    = $group_data['group_id'];
            $group->name        = $group_data['name'];
            $group->description = $group_data['description'];
            $group->level       = $group_data['level'];
            $group->save();
        }


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
        Schema::table('tb_users', function (Blueprint $table) {
            $table->dropColumn('organization_id');
        });
    }
}
