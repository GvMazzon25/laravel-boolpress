<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Film;
use App\Category;
use App\Tag;

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
        $categories = Category::all();
        
        return view('admin.film.index', compact('films','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.film.create', compact('categories','tags'));
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

        //dd($data);

        if(array_key_exists('cover',$data)){
            //salva immagine in storage
            $img_path = Storage::put('films-cover', $data['cover']);
            $data['cover'] = $img_path;
        }

        //CREA NUOVO POST

        $new_film = new Film();

        $id = rand(0,1000);

        echo $id;

        $data['id'] = $id;

        $new_film->fill($data);

        $new_film->save();

        // SALVA IN PIVOT RELAZIONE TRA NUOVO POST CON TAG SELEZIONATI DALLA FORM
        if(array_key_exists('tags', $data)){
            $new_film->tags()->attach($data['tags']);
        }


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

        $categories = Category::all();

        $tags = Tag::all();
        
        if(! $films){
            abort(404);
        }

        return view('admin.film.edit', compact('films','categories','tags'));
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

        //UPDATE RELAZIONI PIVOT TRA POST AGGIORNATO E TAGS

        if(array_key_exists('tags', $data)){
            $films->tags()->sync($data['tags']);
        } else{
            //nessun tags della checkbox
            $films->tags()->detach();
        }

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
        $films = Film::find($id);

        $films->delete();

        //pulizia relazioni con ID post cancellato
        //$films->tags()->detach();

        return redirect()->route('admin.film.index')->with('deleted', $films->name);
    }

    private function validation_roules() {
        return [
            'name' => 'required|max:255',
            'images' => 'required',
            'cast' => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'tags'=> 'nullable|exists:tags,id',
            'cover' => 'nullable|file|mimes:jpg,bmp,png'
            
        ];
    }

    private function validation_messages() {
        return [
            'required' => 'The :attribute is a required field!',
            'max' => 'Max N characters allowed for the :attribute',
            'category_id.exist' => 'The selected category not exist',
        ];
    }

}
