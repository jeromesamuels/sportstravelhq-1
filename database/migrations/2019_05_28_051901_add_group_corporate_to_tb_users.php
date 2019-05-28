<?php
use App\Models\Core\Groups;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGroupCorporateToTbUsers extends Migration
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
                'group_id' => 8,
                'name' => 'Corporate User',
                'description' => 'Corporate User',
                'level' => 8,
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Groups::where('group_id', 8)->delete();
        Schema::table('tb_users', function (Blueprint $table) {
            $table->dropColumn('organization_id');
        });
    }
}
