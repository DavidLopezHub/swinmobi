<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inmueble extends Model
{
    use HasFactory;

    public function zona(){
        return $this->belongsTo(Zona::class);
    }
    public function tipoInmueble(){
        return $this->belongsTo(TipoInmueble::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function reservas(){
        return $this->belongsToMany(Reserva::class)->withTimestamps();
    }
}
