<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import_items', function (Blueprint $table) {
            $table->id();
            $table->integer('num_position');
            $table->string('type');
            $table->unsignedBigInteger('client_id');
            $table->string('importateur');
            $table->string('exportateur');
            $table->unsignedBigInteger('transitaire_id');
            $table->string('marchandise');
            $table->string('dum');
            $table->integer('nbr_colis');
            $table->double('poid_brut');
            $table->string('observation')->nullable();
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
        Schema::dropIfExists('import_items');
    }
}
