<?php

namespace App;

use App\Rol;
use App\Sector;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Tripulante extends Model
{

    use Notifiable;

    protected $fillable = ['name', 'email', 'password', 'id_rol', 'id_sector', 'apellidos'];

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol');
    }

    public function sector()
    {
        return $this->belongsTo(Sector::class, 'id_sector', 'id');
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    
}
