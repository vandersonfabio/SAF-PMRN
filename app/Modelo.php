<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $table = 'modelo';
    protected $primarykey = 'id';

    public $timestamps = false;

    protected $fillable = [        
        'descricao',        
        'idMarca'
    ];

    protected $guarded = [
        
    ];
}