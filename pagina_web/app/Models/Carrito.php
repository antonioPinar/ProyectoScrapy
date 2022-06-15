<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'idProd',
        'idUser',
        'cantidad_prod',
        'total',
    ];

    //crea una tabla enlazada con la tabla Foto
    public function user(){
        return $this->belongsTo(User::class);
    }

    //crea una tabla enlazada con la tabla Foto
    public function producto(){
        return $this->belongsTo(Producto::class);
    }

    
}
