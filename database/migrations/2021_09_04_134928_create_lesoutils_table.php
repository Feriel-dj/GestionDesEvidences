<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLesoutilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesoutils', function (Blueprint $table) {
            $table->id();
            $table->string('nom_produit')->nullable();
            $table->string('version_logiciel')->nullable();
            $table->string('version_matériel')->nullable();
            $table->integer('Num_série')->nullable();
            $table->string('réserver_par')->nullable();
            $table->string('détails')->nullable();
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
        Schema::dropIfExists('lesoutils');
    }
}
