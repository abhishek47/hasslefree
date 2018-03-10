<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('pick_up_airport_terminal');
            $table->dropColumn('pick_up_train_no')->nullable();
            $table->dropColumn('pick_up_train_coach')->nullable();
            $table->dropColumn('pick_up_train_seat')->nullable();
            $table->dropColumn('pick_up_train_time')->nullable();
            $table->string('pick_up_train_pnr')->nullable();
            $table->dropColumn('drop_airport_terminal')->nullable();
            $table->integer('drop_train_station_id')->nullable();
            $table->dropColumn('drop_train_no')->nullable();
            $table->dropColumn('drop_train_coach')->nullable();
            $table->dropColumn('drop_train_seat')->nullable();
            $table->dropColumn('drop_train_time')->nullable();
            $table->string('drop_train_pnr')->nullable();
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
             $table->string('pick_up_airport_terminal');
            $table->string('pick_up_train_no')->nullable();
            $table->string('pick_up_train_coach')->nullable();
            $table->string('pick_up_train_seat')->nullable();
            $table->string('pick_up_train_time')->nullable();
            $table->dropColumn('pick_up_train_pnr')->nullable();
            $table->string('drop_airport_terminal')->nullable();
            $table->string('drop_train_no')->nullable();
            $table->string('drop_train_coach')->nullable();
            $table->string('drop_train_seat')->nullable();
            $table->string('drop_train_time')->nullable();
            $table->dropColumn('drop_train_pnr')->nullable();
        });
    }
}
