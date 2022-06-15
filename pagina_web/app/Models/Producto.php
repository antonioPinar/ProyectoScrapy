<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'precio',
        'cantidad',
        'descripcion',
        'img',
    ];
    
    public function user(){
        return $this->belongsToMany(User::class);
    }
}
