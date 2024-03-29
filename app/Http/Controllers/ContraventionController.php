<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\Contraventions;
use Illuminate\Http\Request;

use function Termwind\render;

class ContraventionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contravention');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fautes=[
            '0'=>[10000,'mauvais parking'],
            '1'=>[20000,'mauvaise conduite'],
            '2'=>[10500,'griller un feu rouge'],
            '3'=>[25000,"pas d'assurence"],
            '4'=>[30000,"causer un accident"],
            '5'=>[17000,"manque de document"],
            '6'=>[21000,"contraventions impayer"],
        ];
        $contravention=new Contraventions();
        $car=Cars::where('matricule',$request->plaque_num)->get();
        if($car->count()<1){
            return view('contravention',["alert"=>"ce matricule n'exste pas dans le system"]);
        }else{
             $contravention->motif=$request->motif;
             $contravention->car_id=$car[0]->id;
             $contravention->montant=$fautes[$request->motif][0];
             $contravention->save();
        return view('contravention',['alert'=>"contravention enregistrer avec success"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car=Cars::find($id);
        return view('contravention',compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
