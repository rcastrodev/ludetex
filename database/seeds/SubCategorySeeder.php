<?php

use App\SubCategory;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubCategory::create([ 'category_id' => 1, 'name' => 'NOVEDADES']);
        SubCategory::create([ 'category_id' => 2, 'name' => 'ALGODÓN']);
        SubCategory::create([ 'category_id' => 2, 'name' => 'ENTREDOS ALGODÓN']);
        SubCategory::create([ 'category_id' => 2, 'name' => 'POLIÉSTER']);
        SubCategory::create([ 'category_id' => 3, 'name' => 'POMPONES']);
        SubCategory::create([ 'category_id' => 4, 'name' => 'FLECOS']);
        SubCategory::create([ 'category_id' => 5, 'name' => 'LÚREX']);
        SubCategory::create([ 'category_id' => 6, 'name' => 'YUTE']);
        SubCategory::create([ 'category_id' => 7, 'name' => 'PASAMANERÍA']);
        SubCategory::create([ 'category_id' => 8, 'name' => 'CINTAS']);
        SubCategory::create([ 'category_id' => 9, 'name' => 'FLUO Y BABY']);
        SubCategory::create([ 'category_id' => 10, 'name' => 'VARIOS']);
    }
}
