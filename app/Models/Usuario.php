<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
class Usuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_apellido',
        'correo',
        'usuario',
        'rol',
        'state',
        'imgprofile',
        'clave',
        'code_verifi',
        'st_verifi',
        'dni',
        'blotype',
        'level',
        'course',
        'genero',
        'typecrd',
        'occupation',
        'department',
        'id_failed_jobs',
    ];
    public function failed_jobs()
    {
        return $this->belongsTo(Failed_job::class, 'id_failed_jobs');
    }




 /*   protected static function boot()
    {
        parent::boot();

        // Evento "saving" para encriptar automáticamente la clave antes de guardar
        static::saving(function ($usuario) {
            // Verificar si la clave ha sido modificada
            if ($usuario->isDirty('clave')) {
                $usuario->clave = Hash::make($usuario->clave);
            }
        });
    }*/
}
