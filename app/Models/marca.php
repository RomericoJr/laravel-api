<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class marca extends Model
{
    use HasFactory;

    protected $fillable = [
        'Type_marca'
    ];

    public function productos(){
        return $this->hasMany('App\Models\Product');
    }
}
