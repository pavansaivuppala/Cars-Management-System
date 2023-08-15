<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cars', function($table) {
            $table->string('car_id')->after('id');
            $table->string('model')->after('users_id');
            $table->string('variant')->after('model');
            $table->string('year')->after('model');
            $table->integer('kilometer')->after('year');
            $table->integer('condition')->after('kilometer');
            $table->integer('no_of_seats')->after('condition');
            $table->string('tax')->after('no_of_seats');
            $table->string('insurance')->after('tax');
            $table->string('price')->after('insurance');
            $table->string('contact_number')->after('price');
            $table->string('state')->after('contact_number');
            $table->string('city')->after('state');
            $table->string('rto')->after('city');
            $table->string('address')->after('rto');
            $table->integer('status')->after('address')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
