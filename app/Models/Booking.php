<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->integer('age');
            $table->string('airline');
            $table->string('trip_type');
            $table->string('class');
            $table->date('departure_date');
            $table->dateTime('departure_time'); // Added this
            $table->date('return_date')->nullable();
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
