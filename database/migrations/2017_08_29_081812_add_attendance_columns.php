<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAttendanceColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dateTime('confirmed_at')->nullable();
            $table->string('dropoff')->nullable();
            $table->string('alergies')->nullable();
            $table->string('comments')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn(['confirmed_at', 'dropoff', 'alergies', 'comments']);
            $table->dropSoftDeletes();
        });
    }
}
