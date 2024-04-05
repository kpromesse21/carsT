<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faute extends Model
{
    use HasFactory;
    protected $fillable =[
        'motif',
        'montant'
    ];
}
