<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->text('special')->nullable();
            $table->integer('user_id');
            $table->integer('bags_count');
            $table->integer('pick_up_type');
            $table->string('pick_up_from')->nullable();
            $table->integer('drop_to_type')->nullable();
            $table->string('drop_to')->nullable();
            $table->integer('pick_up_airport_id')->nullable();
            $table->string('pick_up_airport_terminal')->nullable();
            $table->string('pick_up_flight_number')->nullable();
            $table->integer('pick_up_train_station_id')->nullable();
            $table->string('pick_up_train_no')->nullable();
            $table->string('pick_up_train_coach')->nullable();
            $table->string('pick_up_train_seat')->nullable();
            $table->string('pick_up_train_time')->nullable();
            $table->integer('pick_up_bus_station_id')->nullable();
            $table->integer('drop_airport_id')->nullable();
            $table->string('drop_airport_terminal')->nullable();
            $table->string('drop_flight_number')->nullable();
            $table->integer('drop_train_station_id')->nullable();
            $table->string('drop_train_no')->nullable();
            $table->string('drop_train_coach')->nullable();
            $table->string('drop_train_seat')->nullable();
            $table->string('drop_train_time')->nullable();
            $table->integer('drop_bus_station_id')->nullable();
            $table->string('pick_up_date');
            $table->string('pick_up_time');
            $table->string('drop_date');
            $table->string('drop_time');
            $table->string('phone');
            $table->double('price')->default(0);
            $table->integer('status')->default(0);
            $table->integer('payment_made')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
