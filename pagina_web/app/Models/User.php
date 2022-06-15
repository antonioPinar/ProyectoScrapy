<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'foto_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function roles() {
        return $this->belongsToMany(Role::class); 
        }

    public function foto(){
        return $this->belongsTo(Foto::class);
    }

    public function carrito(){
        return $this->belongsTo(Carrito::class);
    }

    public function productos(){
        return $this->belongsToMany(Producto::class);
    }

    public function getNameUser($id){
        $user = User::find($id);
        return $user->name;
    }

    public function getEmailUser($id){
        $user = User::find($id);
        return $user->email;
    }

    public function getFotoUser($id){
        $user = User::find($id);
        return $user->foto_id;
    }

    public function hasFotoUser($id){
        $user =User::find($id);
        return $user->foto_id;
    }

    public function getFirstLetterName($id){
        $user = User::find($id);
        return substr($user->name,0,1);
    }
}
