<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\Faute;
use Illuminate\Http\Request;

use function Termwind\render;
use App\Models\Contraventions;

class ContraventionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fautes=Faute::all();
        return view('contravention',['fautes'=>$fautes]);
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
        $faute=Faute::find($request->motif);
        $fautes=Faute::all();
        $contravention=new Contraventions();
        $car=Cars::where('matricule',$request->plaque_num)->get();
        if($car->count()<1){
            return view('contravention',["alert"=>"ce matricule n'exste pas dans le system",'fautes'=>$fautes]);
        }else{
             $contravention->motif=$faute->motif;
             $contravention->car_id=$car[0]->id;
             $contravention->montant=$faute->montant;
             $contravention->save();
        return view('contravention',['alert'=>"contravention enregistrer avec success",'fautes'=>$fautes]);
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
        $fautes=Faute::all();
        return view('contravention',['car'=>$car,"fautes"=>$fautes]);
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
