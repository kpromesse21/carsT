<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contraventions extends Model
{
    use HasFactory;
    protected $fillable=[
        'motif',
        'montant',
        'car_id',
        'solve'
    ];
}
