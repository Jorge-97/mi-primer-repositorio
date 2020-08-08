<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $fillable = [
        'Nombre',
        'Telefono',
        'Direccion',
        'Edad',
        'FechaNacimiento',
    
    ];
    
    
    protected $dates = [
        'FechaNacimiento',
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/alumnos/'.$this->getKey());
    }
}
