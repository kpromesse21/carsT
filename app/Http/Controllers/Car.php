<?php

namespace App\Http\Controllers;

use App\Models\Assurence;
use App\Models\Cars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Car extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars=Cars::where('id_user',Auth::user()->id)->get();
        return view('cars',compact('cars'));
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
        //
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
        if ($car->id_user == Auth::user()->id) {
            return view('carOne',compact('car'));
        }else{
            abort(403);
        }
    }
    public function show1($id)
    {   
        
        $car=Cars::find($id);
            return view('carOneD',compact('car'));
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
    public function search(Request $request)
    {
        if($request->req==null){
            return redirect(route('dashboard'));
        }
        $cars=Cars::where('matricule','like','%%'.$request->req.'%%')->get();
        $assurences=Assurence::where('name','like','%'.$request->req.'%')->get();
        return view('dashboard',compact('cars','assurences'));
    }
}
