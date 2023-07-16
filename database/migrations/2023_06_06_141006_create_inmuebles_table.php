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
        Schema::create('inmuebles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo');
            $table->decimal('precio',8,2);
            $table->string('servicios');
            $table->string('img');
            $table->string('superficie');
            $table->string('latitud')->nullable();//Faltaba
            $table->string('longitud')->nullable();//Faltaba
            $table->string('estado_cerradura')->nullable();// [habilitado,desabilitado]
            $table->string('codigo_cerradura')->nullable();//faltaba
            $table->string('estado_inmueble')->nullable();//cambiamos contexto pasa de estado_habitacion a estado_inmueble [a la venta,vendido]
            $table->integer('nro_habitaciones')->nullable();
            $table->integer('capacidad_maxima')->nullable();
            $table->integer('nro_habitacion')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('zona_id');
            $table->unsignedBigInteger('tipo_inmueble_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('zona_id')->references('id')->on('zonas')->onDelete('cascade');
            $table->foreign('tipo_inmueble_id')->references('id')->on('tipo_inmuebles')->onDelete('cascade');

// NroHabitaciones(H-P)=>2
// nroCerradura(H)
// estado_cerradura
// Precio(H-P)
// Estado(H-P)
// servicios(H-P)
// img
// superficie
// capacidad_maxima(H)
// numero(H)=>3
// id_usuario
// id_tipo_inmueble
// id_zona
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inmuebles');
    }
};
