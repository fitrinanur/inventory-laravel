<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'=>'Computer'
        ]);
        Category::create([
            'name'=>'Accesories Computer'
        ]);
        Category::create([
            'name'=>'Scanner'
        ]);
        Category::create([
            'name'=>'Storage Media'
        ]);
        Category::create([
            'name'=>'Printer'
        ]);
        Category::create([
            'name'=>'Gaming Tools'
        ]);
    }
}
