<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_faces', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255); //ФИО
            $table->string('phone', 13)->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('position', 50)->nullable(); //должность
            $table->enum('gender', ['m', 'w'])->default('m');
            $table->enum('status', ['работает', 'уволен', 'временно не работает'])->default('работает');
            $table->foreignId('client_id')->constrained('clients')->cascadeOnDelete();
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
        Schema::dropIfExists('contact_faces');
    }
};
