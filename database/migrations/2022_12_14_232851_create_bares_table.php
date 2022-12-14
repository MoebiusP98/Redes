<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bares', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('ubicacion');
            $table->text('contenido');
            $table->time('hora_apertura');
            $table->time('hora_cierre');
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
        Schema::dropIfExists('bares');
    }
};
