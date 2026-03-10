<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Astros extends Model
{
    use HasFactory;

    protected $table = "astros";
    protected $fillable = ['nombre', 'tipo', 'estado', 'historia', 'caracteristicas', 'explotacion', 'precio', 'img'];
    protected $guarded = ['id'];
}
