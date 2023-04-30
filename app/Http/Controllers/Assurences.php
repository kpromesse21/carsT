<?php

namespace App\Http\Controllers;

use App\Models\Assurence;
use Illuminate\Http\Request;

class Assurences extends Controller
{
    //
    public function assurance(){

        $assurences=Assurence::all();
        return view('assurence',compact('assurences'));
    }
    public static function extrait($input)
    {
       return substr($input,0,70);
    }
    public function search(Request $request)
    {
        if($request->req==null){
            return redirect(route('assurence'));
        }
        $assurences=Assurence::where('name','like','%'.$request->req.'%')->get();
       // dd($assurences);
        return view('assurence',compact('assurences'));
    }
}
