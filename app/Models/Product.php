<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'categoria_id',
        'marca_id',
        'descripcion',
        'precio',
        'stock',
        'UrlImage',
        'estado'
    ];

    public function categoria(){
        return $this->belongsTo('App\Models\categoria');
    }

    public function marca(){
        return $this->belongsTo('App\Models\marca');
    }

}
