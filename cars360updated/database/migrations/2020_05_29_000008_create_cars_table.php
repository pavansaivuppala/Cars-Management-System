<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'cars';

    /**
     * Run the migrations.
     * @table cars
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('car_category_id');
            $table->integer('brands_id');
            $table->integer('attribute_color_id');
            $table->integer('attribute_owner_type_id');
            $table->integer('attribute_fuel_type_id');
            $table->integer('attribute_transmission_type_id');
            $table->integer('seo_information_id');
            $table->integer('users_id');
            $table->nullableTimestamps();
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
