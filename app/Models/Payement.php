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
        'car_id','assurence_id',
    ];
    public function car(){
        return $this->belongsTo(Cars::class,'cars_id','id');
    }
    public function assurences(){
        return $this->belongsTo(Assurence::class,'assurences_id','id');
    }
}
