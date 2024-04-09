<?php

namespace App\Models;

use App\Models\Payement;
use App\Models\Contraventions;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cars extends Model
{
    use HasFactory;
    protected $fillable=[
        "matricule",
        "num_carte_grise",
        "num_carte_propietaire",
        "mark",
        "categorie",
        "id_user",
    ];
    public function payements()
    {
        return $this->hasMany(Payement::class);
    }
    public function contraventions()
    {
        return $this->hasMany(Contraventions::class);
    }
  
    
}
