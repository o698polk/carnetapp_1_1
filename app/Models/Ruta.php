<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    use HasFactory;
     protected $fillable = [
        'rutas',
        'id_filedata',
        'id_multimedias',
        'id_usuario',
    ];

    public function files()
    {
        return $this->belongsTo(Filedata::class, 'id_filedata');
    }
    public function multimedias()
    {
        return $this->belongsTo(Multimedia::class, 'id_multimedias');
    }
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
}
