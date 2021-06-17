<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artists', function (Blueprint $table) {
            $table->id();
            $table->string('firstname')->length(60);
            $table->string('lastname')->length(60);
            $table->foreignId('troupe_id')->nullable();

            $table->foreign('troupe_id')->references('id')->on('troupes')
                ->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**d
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artists');
    }
}
