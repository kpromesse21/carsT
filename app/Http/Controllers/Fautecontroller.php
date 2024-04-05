<?php

namespace App\Http\Controllers;

use App\Models\Faute;
use Illuminate\Http\Request;

class Fautecontroller extends Controller
{
    public function index(){
        $fautes=Faute::all();
        return view('faute.index',['fautes'=>$fautes]);
    }
    public function create(){
        return view('faute.create');
    }
    public function store(Request $request){
        $faute=new Faute();
        $faute->motif=$request->motif;
        $faute->montant=$request->montant;
        $faute->save();
        return redirect()->route('faute.index')->with('alert', 'Opération effectuée avec succès.');
    }
    public function edit(Faute $faute){
        return view('faute.edit',['faute'=>$faute]);
    }
    public function update(Request $request){
        $faute=Faute::find($request->id);
        $faute->motif=$request->motif;
        $faute->montant=$request->montant;
        $faute->save();
        return redirect()->route('faute.show',$faute);
    }
    public function show(Faute $faute){
        return view('faute.detail',['faute'=>$faute]);
    }

}
