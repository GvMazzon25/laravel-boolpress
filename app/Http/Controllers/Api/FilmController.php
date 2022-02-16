<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Film;

class PostController extends Controller
{
    public function index(){
        $films = Film::all();

        return response()->json($films);
    }
}
