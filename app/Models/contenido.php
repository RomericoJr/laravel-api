<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contenido extends Model
{
    use HasFactory;

    public function marca(){
        return $this->belongsTo(marca::class);
    }

    public function categoria(){
        return $this->belongsTo(categoria::class);
    }
}
