<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    public function grado(){
        return $this->belongsTo(Grado::class, 'grado_id', 'id');
    }
}
