<?php

use App\Page;
use App\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Home */
        Section::create(['page_id' => Page::where('name', 'inicio')->first()->id, 'name' => 'section_1']);
        Section::create(['page_id' => Page::where('name', 'inicio')->first()->id, 'name' => 'section_2']);
        Section::create(['page_id' => Page::where('name', 'inicio')->first()->id, 'name' => 'section_3']);

        /** Empresa */
        Section::create(['page_id' => Page::where('name', 'empresa')->first()->id, 'name' => 'section_1']);
        Section::create(['page_id' => Page::where('name', 'empresa')->first()->id, 'name' => 'section_2']);
        Section::create(['page_id' => Page::where('name', 'empresa')->first()->id, 'name' => 'section_3']);
        Section::create(['page_id' => Page::where('name', 'empresa')->first()->id, 'name' => 'section_4']);

        /** Pedidos */ 
        Section::create(['page_id' => Page::where('name', 'pedidos')->first()->id, 'name' => 'section_1']);

        /** Novedades */ 
        Section::create(['page_id' => Page::where('name', 'novedades')->first()->id, 'name' => 'section_1']);
    }
}
