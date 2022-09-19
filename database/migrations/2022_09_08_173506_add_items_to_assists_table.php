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
        Schema::table('assists', function (Blueprint $table) {
            $table->string('dni')->unique();
            $table->string('nombres_com')->nullable();
            $table->string('plataforma')->nullable();
            $table->string('sistema_op')->nullable();
            $table->string('tipo_disp')->nullable();
            $table->string('useragent')->nullable();
            $table->string('usertime')->nullable();
            $table->string('ip_usu')->nullable();
            $table->string('nro_int')->nullable();
            $table->time('estado_asist');
            $table->date('turno');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('assists', function (Blueprint $table) {
            //
        });
    }
};
