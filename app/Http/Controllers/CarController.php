<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\User;
use Illuminate\Http\Request;

class CarController extends Controller
{
    //
    public function register()
    {
        $cars = Cars::all();

        return view('formAddCar', [
            "cars" => $cars
        ]);
    }
    public function registerConfirm(Request $request)
    {
        // if(User::where('email',$request->mail)->first()){
        // $id_user=User::where('email',$request->mail)->first()->id;
        Cars::create([
            'matricule' => $request->matricule,
            'num_carte_grise' => $request->num_carte_grise,
            'num_carte_propietaire' => $request->num_carte_proprietaire,
            "categorie" => $request->categorie,
            "mark" => $request->mark,
            // "user_id"=>$id_user,
        ]);
        $cars = Cars::all();
        return view('formAddCar', ['cars' => $cars]);
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
        $car = Cars::find($id);
        return view('car.detail', ['car' => $car]);
    }
    public function edit($id)
    {
        $car = Cars::find($id);
        return view('car.edition', ['car' => $car]);
    }

    public function update(Request $request)
    {
        $car = Cars::find($request->car);
        $car->mark = $request->mark;
        $car->num_carte_grise = $request->num_carte_grise;
        $car->num_carte_propietaire = $request->num_carte_proprietaire;
        $car->categorie = $request->categorie;


        $car->save();

        return view('car.edition', [
            'car' => $car,
            "alert"=>"mis à jour effectuer avec succes"
        ]);
    }

    public function rechercher(Request $request)
    {
        $user = User::where("email", "like", '%%' . $request->search . '%%')->orWhere("name", '%%' . $request->search . '%%')->get();
        $car = Cars::find($request->id);
        // $cars=Cars::where('matricule','like','%%'.$request->req.'%%')->get();
        // dd($user);
        return view('car.edition', [
            'user' => $user,
            'car' => $car
        ]);
    }

    public function ajout_proprio(Request $request)
    {
        $user = User::find($request->user);
        $car = Cars::find($request->car);
        // dd($user->name,$car->mark);
        $car->user_id = $user->id;
        $car->save();
        // dd($car);
        return view('car.edition', [
            'car' => $car,
            "alert"=>"l'affectation du proprietaire effectué"
        ]);
    }
}
