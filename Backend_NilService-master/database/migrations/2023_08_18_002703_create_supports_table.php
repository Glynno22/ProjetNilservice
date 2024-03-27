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
        if (!Schema::hasTable('supports')) {
            Schema::create('supports', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nomSup');
                $table->string('emailSup');
                $table->string('motPass');
                $table->string('telSup');
                $table->string('positionSup');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supports');
    }
};
