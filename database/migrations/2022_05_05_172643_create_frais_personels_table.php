<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFraisPersonelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frais_personels', function (Blueprint $table) {
            $table->id();
            $table->double('frais_auto');
            $table->double('frais_tele');
            $table->double('frais_gasoil');
            $table->integer('nbre_days');
            $table->double('devplacement');
            $table->double('frais_total');
            $table->unsignedBigInteger('import_id');
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
        Schema::dropIfExists('frais_personels');
    }
}
