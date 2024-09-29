<?php

use App\Models\Role;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // Ajout de la colonne 'name'
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('first_name')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('id_card_number')->nullable();
            $table->string('id_card_front')->nullable();
            $table->string('id_card_back')->nullable();
            $table->string('driver_license_number')->nullable();
            $table->string('driver_license_front')->nullable();
            $table->string('driver_license_back')->nullable();
            $table->string('vehicle_registration')->nullable();
            $table->string('vehicle_photo')->nullable();
            $table->string('vehicle_brand')->nullable();
            $table->string('vehicle_registration_front')->nullable();
            $table->string('vehicle_registration_back')->nullable();
            $table->string('vehicle_insurance')->nullable();
            $table->string('vehicle_vignette')->nullable();
            $table->boolean('is_approved')->default(false);
            $table->foreignIdFor(Role::class)
                ->constrained()
                ->restrictOnUpdate()
                ->restrictOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};