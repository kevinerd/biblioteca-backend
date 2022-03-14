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
     *
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string('isbn');
            $table->string('titulo');
            $table->foreignId('autor_id');
            $table->string('editorial');
            $table->foreignId('genero_id');
            $table->integer('paginas')->unsigned();
            $table->integer('anio')->unsigned();
            $table->longText('sipnosis');
            $table->string('thumb')->default(\App\Models\Libro::IMG_DEFAULT);
            $table->boolean('destacado')->default(\App\Models\Libro::NO_DESTACADO);
            $table->boolean('semanal')->default(\App\Models\Libro::NO_SEMANAL);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('autor_id')->references('id')->on('autores');
            $table->foreign('genero_id')->references('id')->on('generos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libros');
    }
};
