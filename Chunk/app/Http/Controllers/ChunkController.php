<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChunkController extends Controller
{
    //



    public function show(){

        return view('chunk.show')
            ->with(['data' => 'C']);
    }

}
