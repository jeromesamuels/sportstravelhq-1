<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrganizationToPaymentDefaults extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('team_payment_defaults', 'hotel_cc_auth_defaults');
        Schema::table('hotel_cc_auth_defaults', function (Blueprint $table) {
            $table->bigInteger('organization_id');
            $table->dropColumn('team_id');
        });
        Schema::table('hotel_agreement_defaults', function (Blueprint $table) {
            $table->bigInteger('organization_id');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hotel_cc_auth_defaults', function (Blueprint $table) {
            $table->dropColumn('organization_id');
            $table->bigInteger('team_id');
        });
        Schema::table('hotel_agreement_defaults', function (Blueprint $table) {
            $table->dropColumn('organization_id');
        });
        Schema::rename('hotel_cc_auth_defaults', 'team_payment_defaults');
    }
}
