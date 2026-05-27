<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Usuarios extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = "usuarios";
    protected $guarded = [];

    protected $hidden = ['password'];

    public function esAdmin(): bool
    {
        return $this->rol == 1;
    }
}