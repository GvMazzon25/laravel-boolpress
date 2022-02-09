<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Film;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = Film::all();

        return view('admin.film.index', compact('films'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.film.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation
        $request->validate($this->validation_roules(), $this->validation_messages());
        
        $data = $request->all();

        //CREA NUOVO POST

        $new_film = new Film();

        $id = rand(0,1000);

        echo $id;

        $data['id'] = $id;

        $new_film->fill($data);

        $new_film->save();

        return redirect()->route('admin.film.show', $new_film->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $films = Film::where('id', $id)->first();

        if(! $id) {
            abort(404);
        }

        return view('admin.film.show', compact('films'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $films = Film::find($id);
        
        if(! $films){
            abort(404);
        }

        return view('admin.film.edit', compact('films'));
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

        $request->validate($this->validation_roules(), $this->validation_messages());
        
        $data = $request->all();
        
        $films = Film::find($id);

        $films->update($data);

        return redirect()->route('admin.film.show', $films->id);
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

    private function validation_roules() {
        return [
            'name' => 'required|max:255',
            'images' => 'required',
            'cast' => 'required'
        ];
    }

    private function validation_messages() {
        return [
            'required' => 'The :attribute is a required field!',
            'max' => 'Max N characters allowed for the :attribute'
        ];
    }

}
