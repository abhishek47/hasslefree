<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPricingToBookings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->float('base_price')->default(0);
            $table->float('gst')->default(0);
            $table->float('subtotal')->default(0);
            $table->float('handling_charges')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('base_price');
            $table->dropColumn('gst');
            $table->dropColumn('subtotal');
            $table->dropColumn('handling_charges');
        });
    }
}
