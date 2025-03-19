<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    // Tabla asociada
    protected $table = 'imagenes';
    protected $primaryKey = 'idimagen';
    public $timestamps = false; // si tu tabla no usa created_at y updated_at

    protected $fillable = ['categoria', 'imagen', 'descripcion'];
}
