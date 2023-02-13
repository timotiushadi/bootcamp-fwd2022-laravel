<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id')->nullable()->index('fk_doctor_to_doctor');
            $table->foreignId('user_id')->nullable()->index('fk_doctor_to_users');
            $table->foreignId('consultation_id')->nullable()->index('fk_doctor_to_consultation');
            $table->enum('level', ['low', 'medium','high']);
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->enum('status', ['waiting', 'success','canceled']);
            $table->timestamps();
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
        Schema::dropIfExists('appointment');
    }
}
