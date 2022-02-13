<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //Pagina Categoria

    public function show($id){
        return view('admin.categories.show');
    }
}
