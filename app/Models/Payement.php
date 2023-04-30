<?php

namespace App\Models;

use App\Models\Cars;
use App\Models\Assurence;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payement extends Model
{
    use HasFactory;
    protected $fillable=[
        'cars_id','assurences_id',
    ];
    public function car(){
        return $this->belongsTo(Cars::class);
    }
    public function assurence(){
        return $this->belongsTo(Assurence::class);
    }
}
