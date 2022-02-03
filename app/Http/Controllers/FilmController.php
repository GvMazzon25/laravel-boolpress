<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Film;

class FilmController extends Controller
{
    public function index() {
        $films = Film::all();
            
        return view('films', compact('films')
        );
    }    
}
