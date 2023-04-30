<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarTracker extends Controller
{
    //
    public function showPanel(){
        return view('home');
    }
}
