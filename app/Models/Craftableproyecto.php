<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Craftableproyecto extends Model
{
    protected $table = 'craftableproyecto';

    protected $fillable = [
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/craftableproyectos/'.$this->getKey());
    }
}
