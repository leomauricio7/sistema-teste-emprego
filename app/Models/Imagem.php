<?php

namespace App\Models;
use App\Models\Galeria;

use Illuminate\Database\Eloquent\Model;

class Imagem extends Model
{
    protected $fillable = [
        'id',
        'image',
        'id_galeria'
    ];

    public function galeria(){
        return $this->belongsTo(Galeria::class, 'id_galeria');
    }
}
