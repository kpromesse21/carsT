<?php

namespace App\Http\Controllers;

use App\Models\Assurence;
use Illuminate\Http\Request;

class AssurenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assurences=Assurence::all();
        return view('assurences',compact('assurences'));
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
      
        Assurence::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'description'=>$request->description,
        ]);
        return redirect(route('assurence.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assurence=Assurence::find($id);
        return view('detailAssurence',compact('assurence'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $assurence=Assurence::find($id);
        if(isset($assurence)){
            return view('detailEdit',compact('assurence'));
        }else{
            return redirect(route('assurence.index'));
        }
        
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
        $assurence=Assurence::find($id);
        $assurence->name=$request->name;
        $assurence->price=$request->price;
        $assurence->description=$request->description;
        $assurence->save();
        return redirect(route('assurence.show',['assurence'=>$id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assurence=Assurence::find($id);
        $assurence->delete();
        return redirect(route('assurence.index'));
    }
    
   
}
