<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarImagesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'car_images';

    /**
     * Run the migrations.
     * @table car_images
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('cars_id');
            $table->string('front')->nullable();
            $table->string('rear')->nullable();
            $table->string('left')->nullable();
            $table->string('right')->nullable();
            $table->string('top')->nullable();
            $table->string('wheels')->nullable();
            $table->string('interior_dashboard')->nullable();
            $table->string('interior_back')->nullable();

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
