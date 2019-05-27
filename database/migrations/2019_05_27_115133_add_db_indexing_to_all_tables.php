<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDbIndexingToAllTables extends Migration
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
            $table->index(['ordering']);

            $table->index(['parent_id', 'position', 'active', 'ordering']);
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
            $table->index(['status']);
        });

        Schema::table('tb_notification', function (Blueprint $table) {
            $table->index(['userid']);
            $table->index(['is_read']);
            $table->index(['created']);

            $table->index(['userid', 'is_read', 'created']);
        });

        Schema::table('user_trips', function (Blueprint $table) {
            $table->index(['entry_by']);
            $table->index(['added']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_users', function (Blueprint $table) {
            $table->dropIndex(['username']);
            $table->dropIndex(['email']);
            $table->dropIndex(['group_id']);
        });

        Schema::table('tb_menu', function (Blueprint $table) {
            $table->dropIndex(['parent_id']);
            $table->dropIndex(['active']);
            $table->dropIndex(['position']);
            $table->dropIndex(['ordering']);

            $table->dropIndex(['parent_id', 'position', 'active', 'ordering']);
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
            $table->dropIndex(['status']);
        });

        Schema::table('tb_notification', function (Blueprint $table) {
            $table->dropIndex(['userid']);
            $table->dropIndex(['is_read']);
            $table->dropIndex(['created']);

            $table->dropIndex(['userid', 'is_read', 'created']);
        });

        Schema::table('user_trips', function (Blueprint $table) {
            $table->dropIndex(['entry_by']);
            $table->dropIndex(['added']);
        });
    }
}
