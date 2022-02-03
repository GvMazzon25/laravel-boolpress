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
        for ($i = 0; $i < 20; $i++){
            $new_film = new Film();

            $new_film->name = 'Alien';
            $new_film->images = '';
        }
    }
}
