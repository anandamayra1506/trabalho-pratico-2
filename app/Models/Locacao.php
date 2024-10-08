<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locacao extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantidade', 
        'nomelivro', 
        'nomecliente',
        'dataemp',
        'datadev'
       ];
}
