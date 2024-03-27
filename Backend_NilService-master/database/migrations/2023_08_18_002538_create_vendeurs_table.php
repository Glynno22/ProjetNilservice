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
        if (!Schema::hasTable('vendeur')) {
            Schema::create('vendeur', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nom');
                $table->string('email');
                $table->string('passe');
                $table->integer('phone');
                $table->string('pays');
                $table->string('lieu');
                $table->string('ville');
                $table->string('quartier');
                $table->string('boutique');
                $table->date('dateCreation');
                $table->string('code');
                $table->string('parrain');
                $table->integer('status');// 0 signifie activer et 1 desactiver
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendeurs');
    }
};
