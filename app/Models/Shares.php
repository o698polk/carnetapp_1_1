<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shares extends Model
{
    use HasFactory;

    protected $fillable = [
       
        'id_filedata',
        'id_customer',
        'id_supplier',
       
    ];

    public function files()
    {
        return $this->belongsTo(Filedata::class, 'id_filedata');
    }
   
    public function customer()
    {
        return $this->belongsTo(Usuario::class, 'id_customer');
    }
     public function supplier()
    {
        return $this->belongsTo(Usuario::class, 'id_supplier');
    }
}
