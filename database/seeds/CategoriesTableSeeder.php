<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Film Categories

        $categories = ['Azione','Fantasy','Fantascienza','Commedy'];

        foreach ($categories as $category){
            $new_category = new Category();
            $new_category->name = $category;
            $new_category->slug = Str::slug($new_category->name,'-');
            
            $new_category->save(); 
        }
    }
}
