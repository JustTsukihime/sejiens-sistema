<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('surname');
            $table->string('email')->unique();
            $table->string('phone')->unique()->nullable();
            $table->string('hash')->nullable();
            $table->string('attending')->nullable();
            $table->string('food')->nullable();
            $table->string('health')->nullable();
            $table->string('tshirt')->nullable();
            $table->string('mentor')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('allergies')->nullable();
            $table->text('about')->nullable();
            $table->text('comments')->nullable();
            $table->dateTime('applied_at');
            $table->dateTime('confirmed_at')->nullable();
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
        Schema::dropIfExists('students');
    }
}
