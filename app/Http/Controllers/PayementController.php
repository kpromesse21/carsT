<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\Payement;
use App\Models\Assurence;
use Illuminate\Http\Request;

class PayementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assurences=Assurence::all();
        return view('payement',compact('assurences'));
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
        

        if($request->assurence==null || $request->matricule==null){
            $erros="veillez remplire tout les champs SVP";
            $assurences=Assurence::all();
            return view('payement',compact('assurences','erros'));
           // return view('payement',compact('erros'));
        }else{

            $car=Cars::where('matricule',$request->matricule)->get()->first();
           if($car==null){
            $erros="ce matricule n'existe pas dans le systeme";
            $assurences=Assurence::all();
            return view('payement',compact('assurences','erros'));
           }else{
             $cars_id=$car->id;
            $assurence=$request->assurence;
            Payement::create([
                'cars_id'=>$cars_id,
                'assurences_id'=>$assurence,
            ]);
            $assurences=Assurence::all();
            $log="payement effectué  avec success";
            return view('payement',compact('assurences','log'));
           }
           
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
