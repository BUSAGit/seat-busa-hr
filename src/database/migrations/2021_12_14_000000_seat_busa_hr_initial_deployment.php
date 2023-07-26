<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeatHrInitialDeployment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seat_busa_hr_notes', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('director_only')->default(false);
            $table->longText('note');
            $table->bigInteger('created_by')->unsigned();
            $table->integer('note_for')->unsigned();

            $table->foreign('note_for')
                ->references('character_id')
                ->on('users');

            $table->foreign('created_by')
                ->references('id')
                ->on('users');
                
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
        Schema::dropIfExists('seat_busa_hr_notes');
    }
}