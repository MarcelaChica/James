<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Bookings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id()->autoIncrement()->unique();
            $table->foreignId('id_user')->nullable()->constrained('users')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('id_teacher')->nullable()->constrained('teachers')->cascadeOnUpdate()->nullOnDelete();
            $table->date('date')->nullable();
            $table->string('address')->nullable();
            $table->boolean('state');
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
