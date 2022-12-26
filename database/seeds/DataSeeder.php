<?php

use App\Data;
use App\Company;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Data::create([
            'company_id'    => Company::first()->id,
            'address'       => 'ARA, Mansilla 5359, B1874 Wilde, Provincia de Buenos Aires',
            'email'         => 'ventas@bulessrl.com.ar',
            'phone1'        => '+541144413928|+54 (11) 4441-3928',
            'phone3'        => '01142077291|011 4207-7291',
            'logo_header'   => 'images/data/logo_header.svg',
            'logo_footer'   => 'images/data/logo_footer.svg'
        ]);
         
    }
}
