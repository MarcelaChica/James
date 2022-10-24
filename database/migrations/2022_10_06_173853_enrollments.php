<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Enrollments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id()->autoIncrement()->unique();
            $table->foreignId('id_user')->nullable()->constrained('users')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('id_package')->nullable()->constrained('packages')->cascadeOnUpdate()->nullOnDelete();
            $table->boolean('state');
            $table->date('date')->nullable();
            $table->date('start')->nullable();
            $table->date('end')->nullable();
            $table->string('num_class')->nullable();
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
        Schema::dropIfExists('enrollments');
    }
}
