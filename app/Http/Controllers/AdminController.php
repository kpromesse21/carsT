<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function gestionAgent(){
        $users=User::where('statut','!=',1)->get();
        return view('gestionAgent',compact('users'));
    }
    public function gestionAgentSearch(Request $request){
        $users=User::where('name','like','%'.$request->req.'%')->get()->where('statut','!=',1);
        return view('gestionAgent',compact('users'));
    }
    public function gestionAgentStatut(Request $request){
        $id=$request->id;
        return view('formChangeStatut',compact('id'));
    }
    public function gestionAgentStatutPlus(Request $request){
        
        $id=$request->id;
        $statut=$request->statut;
        $user=User::find($id);
        $user->statut=$statut;
        $user->save();
        $tab=[
            '2'=>"agent de la DGI",
            '3'=>"agent de la PCR",
            '4'=>"simble utilisateur",
        ];
        $users=User::where('statut','!=',1)->get();
        $log="le compte de ".$user->name." a été changé en ".$tab[$statut];
        // dd($log);
        return view('gestionAgent',compact('log','users'));

    }
}
