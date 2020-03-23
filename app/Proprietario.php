<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proprietario extends Model
{
    protected $table = 'proprietario';
    protected $primarykey = 'id';

    public $timestamps = false;

    protected $fillable = [        
        'descricao',        
        'cnpj'
    ];

    protected $guarded = [
        
    ];
}