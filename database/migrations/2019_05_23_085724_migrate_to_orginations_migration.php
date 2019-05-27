<?php

use App\Models\Core\Groups;
use App\Models\Organization;
use App\Models\OrganizationUser;
use App\User;
use Illuminate\Database\Migrations\Migration;

class MigrateToOrginationsMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $group = Groups::where('name', 'Travel Coordinator')->first();

        $users = User::where('group_id', $group->group_id)->get();

        foreach ($users as $user) {
            //-- Is this a new record that supports the new organization system
            if ($user->organization_id) {
                //-- Let skip
                continue;
            }

            $name = $user->o_name;

            //-- If the user's org is empty, then provide a temp name.
            if (!$name) {
                $name = 'Unnamed';
            }

            //-- Each coordinator only ever belongs to a single organization, so
            // each one will have a new org created
            $organization       = new Organization();
            $organization->name = $name;
            $organization->save();

            $organization->users()->attach($user->id);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Organization::all()->each(
            function (Organization $organization) {
                $organization->delete();
            }
        );
        OrganizationUser::all()->each(
            function (OrganizationUser $organizationUser) {
                $organizationUser->delete();
            }
        );
    }
}
