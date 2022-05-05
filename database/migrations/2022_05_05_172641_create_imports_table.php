<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imports', function (Blueprint $table) {
            $table->id();
            $table->integer('num_dossier');
            $table->string('manifeste');
            $table->date('date');
            $table->unsignedBigInteger('driver_id');
            $table->string('mat_camion');
            $table->string('mat_remorque');
            $table->string('compagne');
            $table->string('navire');
            $table->string('provenance');
            $table->string('destination');
            $table->date('date_arrivée');
            $table->date('date_sortie');
            $table->string('observation')->nullable();
            $table->double('tarre');
            $table->double('poid_brut');
            $table->integer('nbr_colis');
            $table->double('frais_peage');
            $table->double('frais_TMSA');
            $table->double('montant_fret');
            $table->double('devise');
            $table->string('cours');
            $table->string('type');
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('imports');
    }
}
