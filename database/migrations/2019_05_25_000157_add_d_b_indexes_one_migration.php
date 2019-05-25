<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDBIndexesOneMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_users', function (Blueprint $table) {
            $table->index(['username']);
            $table->index(['email']);
            $table->index(['group_id']);
        });

        Schema::table('tb_menu', function (Blueprint $table) {
            $table->index(['parent_id']);
            $table->index(['active']);
            $table->index(['position']);

            $table->index(['parent_id', 'position', 'active']);
        });

        Schema::table('tb_module', function (Blueprint $table) {
            $table->index(['module_name']);
        });

        Schema::table('tb_groups', function (Blueprint $table) {
            $table->index(['name']);
        });

        Schema::table('trip_statuses', function (Blueprint $table) {
            $table->index(['title']);
        });

        Schema::table('rfps', function (Blueprint $table) {
            $table->index(['user_trip_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('organizations', function (Blueprint $table) {
            $table->dropIndex('user_id');
        });

        Schema::table('tb_users', function (Blueprint $table) {
            $table->dropIndex(['username']);
            $table->dropIndex(['email']);
            $table->dropIndex(['group_id']);
        });

        Schema::table('tb_menu', function (Blueprint $table) {
            $table->dropIndex(['parent_id']);
            $table->dropIndex(['active']);
            $table->dropIndex(['position']);

            $table->dropIndex(['parent_id', 'position', 'active']);
        });

        Schema::table('tb_module', function (Blueprint $table) {
            $table->dropIndex(['module_name']);
        });

        Schema::table('tb_groups', function (Blueprint $table) {
            $table->dropIndex(['name']);
        });

        Schema::table('trip_statuses', function (Blueprint $table) {
            $table->dropIndex(['title']);
        });

        Schema::table('rfps', function (Blueprint $table) {
            $table->dropIndex(['user_trip_id']);
        });
    }
}
