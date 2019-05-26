<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Imagem;

class Galeria extends Model
{
    protected $table = 'Galerias';
    
    protected $fillable = [
        'id',
        'title',
        'description',
        'id_user'
    ];
    public $rules = [
        'title'         =>  'required|min:5',
        'description'   =>  'required|min:10|max:1000'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }

    public function imagems(){
        return $this->hasMany(Imagem::class, 'id_galeria');
    }
}
