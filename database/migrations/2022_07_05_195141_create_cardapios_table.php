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
        Schema::create('cardapios', function (Blueprint $table) {
            $table->id();
            $table->String('data');
            $table->bigInteger('id_cafe');
            $table->bigInteger('id_almoco');
            $table->bigInteger('id_janta');
            $table->foreign('id_cafe')->references('id')->on('cafe_manhas')->onDelete('cascade');
            $table->foreign('id_almoco')->references('id')->on('almocos')->onDelete('cascade');
            $table->foreign('id_janta')->references('id')->on('jantas')->onDelete('cascade');
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
        Schema::dropIfExists('cardapios');
    }
};
