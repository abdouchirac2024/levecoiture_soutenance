<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('rides', function (Blueprint $table) {
            $table->id();
            $table->foreignId('driver_id')->constrained('users');
            $table->string('departure');
            $table->string('destination');
            $table->dateTime('departure_time');
            $table->integer('available_seats');
            $table->decimal('price', 8, 2);
            $table->text('description')->nullable();
            $table->string('phone_number');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rides');
    }
};