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
        Schema::create('talleres', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->longText('descripcion');
            $table->string('profesor');
            $table->string('dias');
            $table->boolean('destacado')->default(\App\Models\Taller::NO_DESTACADO);
            $table->boolean('disponible')->default(\App\Models\Taller::DISPONIBLE);
            $table->string('thumb')->default(\App\Models\Taller::IMG_DEFAULT);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('talleres');
    }
};
