<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filial extends Model
{
    protected $table = 'filiais';
    protected $fillable = [
        'nome', 'cidade', 'cnpj', 'endereco', 'email', 'longitude', 'latitude'
    ];
}
