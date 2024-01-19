<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Failed_job extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'nombre_institution',
        'correo_institution',
        'dni_institution',
        'state_institution',
        'img_logo',
        'web_institution',
        'bgk_institution_m',
        'bgk_institution_f',
        'representative_inst',
    ];
}
