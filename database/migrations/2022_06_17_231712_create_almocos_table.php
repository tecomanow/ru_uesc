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
        Schema::create('almocos', function (Blueprint $table) {
            $table->id();
            $table->String('proteinas');
            $table->String('saladas');
            $table->String('complementos');
            $table->String('sucos');
            $table->String('data');
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
        Schema::dropIfExists('almocos');
    }
};
