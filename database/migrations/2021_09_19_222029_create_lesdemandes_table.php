<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLesdemandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesdemandes', function (Blueprint $table) {
            $table->id();  
            $table->text('cas')->nullable();
            $table->text('num_dossier')->nullable();
            $table->text('crime')->nullable();
            $table->text('classification')->nullable();
            $table->text('cas_suspect')->nullable();
            $table->text('investigateur_légiste')->nullable();
            $table->text('responsable_enquete')->nullable();
            $table->text('investigateur_de_cas')->nullable();
            $table->text('investigateur_tel')->nullable();
            $table->text('unite_enqueteur')->nullable();
            $table->date('date_confiscation')->nullable();
            $table->text('description_demande')->nullable();
            $table->text('action_demande')->nullable();
            $table->text('examinateur_notes')->nullable();
            $table->integer('contient_appareils')->nullable();
            $table->integer('cas_urgence')->nullable();
            $table->text('cas_urgence_justification')->nullable();
            $table->string('fichier')->nullable();
            $table->foreignId('user_id')->nullable()->constrained();
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
        Schema::dropIfExists('lesdemandes');
    }
}
