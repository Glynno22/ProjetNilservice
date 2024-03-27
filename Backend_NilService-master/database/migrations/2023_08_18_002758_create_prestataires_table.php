<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('prestataire')) {
            Schema::create('prestataire', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nom');
                $table->string('email');
                $table->string('passe');
                $table->integer('phone');
                $table->string('pays');
                $table->string('ville');
                $table->string('quartier');
                $table->string('categorie');
                $table->string('scanner');
                $table->string('photo');
                $table->string('cni');
                $table->text('description');
                $table->string('code');
                $table->string('parrain');
                $table->integer('statut');// 0 signifie activer et 1 desactiver
                $table->date('dateCreation');
                $table->string('cv');
                $table->string('diplome');
                $table->timestamps();
            });
        }
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestataires');
    }
};
