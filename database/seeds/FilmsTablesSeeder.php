<?php

use Illuminate\Database\Seeder;
use App\Film;

class FilmsTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Film::truncate();


        for ($i = 0; $i < 20; $i++){
            $new_film = new Film();

            $new_film->name = 'Alien';
            $new_film->images = 'https://tse4.mm.bing.net/th?id=OIP.mwR72s5wgJdhJb_IvaHf0gHaLG&pid=Api&P=0&w=107&h=160';
            $new_film->cast = 'Sigourney Weaver, Carrie Henn, Michael Biehn, Paul Reiser, Lance Henriksen';
            $new_film->is_available = true;

            $new_film->save();
        }
    }
}
