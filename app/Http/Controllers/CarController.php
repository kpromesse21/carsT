<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\User;
use Illuminate\Http\Request;

class CarController extends Controller
{
    //
    public function register(){

        return view('formAddCar');
    }
    public function registerConfirm(Request $request){
        if(User::where('email',$request->mail)->first()){
            $id_user=User::where('email',$request->mail)->first()->id;
            Cars::create([
                'matricule'=>$request->matricule,
                'num_carte_grise'=>$request->num_carte_grise,
                'num_carte_proprietaire'=>$request->num_carte_proprietaire,
                "categorie"=>$request->categorie,
                "mark"=>$request->mark,
                "id_user"=>$id_user,
            ]);
            return view('formAddCar');
        }else{
            $alert='aucun utilisateur ne corespond à cet email';
            return view('formAddCar',compact('alert'));
        }
        
    }
}
