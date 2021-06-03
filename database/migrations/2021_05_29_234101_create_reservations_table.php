<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->integer('places')->length(11); // Ajout B
            $table->foreignId('user_id'); // Ajout B
            $table->foreignId('representation_id'); // Ajout B

            $table->foreign('user_id')->references('id')->on('users') // Ajout B
                    ->onDelete('restrict')->onUpdate('cascade'); // Ajout B
            $table->foreign('representation_id')->references('id')->on('representations') // Ajout B
                    ->onDelete('restrict')->onUpdate('cascade'); // Ajout B


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
