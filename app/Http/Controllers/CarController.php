<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\User;
use Illuminate\Http\Request;

class CarController extends Controller
{
    //
    public function register(){
        $cars=Cars::all();

        return view('formAddCar',[
            "cars"=>$cars
        ]);
    }
    public function registerConfirm(Request $request){
        // if(User::where('email',$request->mail)->first()){
            // $id_user=User::where('email',$request->mail)->first()->id;
            Cars::create([
                'matricule'=>$request->matricule,
                'num_carte_grise'=>$request->num_carte_grise,
                'num_carte_propietaire'=>$request->num_carte_proprietaire,
                "categorie"=>$request->categorie,
                "mark"=>$request->mark,
                // "user_id"=>$id_user,
            ]);
            $cars=Cars::all();
            return view('formAddCar',['cars'=>$cars]);
        // }else{
        //     $alert='aucun utilisateur ne corespond à cet email';
        //     return view('formAddCar',[
        //         'alert'=>$alert,
        //         'cars'=>$cars
        //     ]);
        // }
        
    }
    public function show($id)
    {
        // dd($id);
        $car=Cars::find($id);
        return view('car.detail',['car'=>$car]);
    }
    public function edit($id){
        $car=Cars::find($id);
        return view('car.edition',['car'=>$car]);
        // dd($id);
    }

    public function update($request){
        dd($request);
    }
}
