<?php
use App\Models\Core\Groups;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SaveGroupIdToGroups extends Migration
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
