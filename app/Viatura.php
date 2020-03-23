<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viatura extends Model
{
    protected $table = 'viatura';
    protected $primarykey = 'id';

    public $timestamps = false;

    protected $fillable = [        
        'chassi',        
        'placa',
        'prefixo',
        'ano',
        'aquisicao',
        'isOperant',
        'isActive',
        'observacoes',
        'recebimento',
        'baixa',
        'efetivo',
        'idModelo',
        'idProprietario',
        'idUnidade'
    ];

    protected $guarded = [
        
    ];
}