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
            $table->integer('doctor_id');
            $table->integer('user_id');
            $table->integer('consultation_id');
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
