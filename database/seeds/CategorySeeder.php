<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'NOVEDADES']);
        Category::create(['name' => 'PUNTILLAS']);
        Category::create(['name' => 'POMPONES']);
        Category::create(['name' => 'FLECOS']);
        Category::create(['name' => 'LÚREX']);
        Category::create(['name' => 'YUTE']);
        Category::create(['name' => 'PASAMANERÍA']);
        Category::create(['name' => 'CINTAS']);
        Category::create(['name' => 'FLUO Y BABY']);
        Category::create(['name' => 'VARIOS']);
    }
}
