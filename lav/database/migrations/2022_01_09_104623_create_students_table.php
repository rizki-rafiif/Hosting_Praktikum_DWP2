<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Rancangan struktur tabel
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->integer('nim');
            $table->string('name');
            $table->char('gender', 1);
            $table->string('department');
            $table->text('address')->nullable();
            $table->timestamps();
        });
        // gunakan command php artisan migrate:fresh untuk menjalankan query di atas
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
