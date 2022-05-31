<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;
    protected $fillable=['ruta_foto'];

    //crea una tabla enlazada con la tabla Foto
    public function role(){
       return $this->belongsTo(Foto::class);
   }
}
