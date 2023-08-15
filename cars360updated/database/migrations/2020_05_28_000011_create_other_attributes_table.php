<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtherAttributesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'other_attributes';

    /**
     * Run the migrations.
     * @table other_attributes
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('cars_id');
            $table->boolean('ac')->nullable();
            $table->boolean('heater')->nullable();
            $table->boolean('air_bags')->nullable();
            $table->boolean('power_window')->nullable();
            $table->boolean('adjustable_steering')->nullable();
            $table->boolean('power_steering')->nullable();
            $table->boolean('power_windows_front')->nullable();
            $table->boolean('power_windows_rear')->nullable();
            $table->boolean('remote_fuel_lid_opener')->nullable();
            $table->boolean('low_fuel_warning_light')->nullable();
            $table->boolean('vanity_mirror')->nullable();
            $table->boolean('rear_seat_head_rest')->nullable();
            $table->boolean('rear_seat_centre_arm_rest')->nullable();
            $table->boolean('cup_holder_front')->nullable();
            $table->boolean('cup_holder_rear')->nullable();
            $table->boolean('anti_lock_braking_system')->nullable();
            $table->boolean('power_door_locks')->nullable();
            $table->boolean('child_safety_locks')->nullable();
            $table->boolean('anti_theft_alarm')->nullable();
            $table->boolean('driver_airbags')->nullable();
            $table->boolean('passenger_airbags')->nullable();
            $table->boolean('rear_seat_belts')->nullable();
            $table->boolean('seat_belt_warning')->nullable();
            $table->boolean('adjustable_seats')->nullable();
            $table->boolean('keyless_entry')->nullable();
            $table->boolean('immobilizer')->nullable();
            $table->boolean('manually_adjustable_exterior_rear_view_mirror')->nullable();
            $table->boolean('electric_folding_rear_view_mirror')->nullable();
            $table->boolean('rain_sensing_wipers')->nullable();
            $table->boolean('adustable_head_lights')->nullable();
            $table->boolean('power_adjustable_exterior_rear_view_mirror')->nullable();
            $table->boolean('alloy_wheels')->nullable();
            $table->boolean('tinted_glass')->nullable();
            $table->boolean('front_fog_lights')->nullable();
            $table->boolean('rear_window_defogger')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
