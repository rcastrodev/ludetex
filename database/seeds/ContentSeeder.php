<?php

use App\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Home  */
        /** Slider */
        for ($i=0; $i <= 2; $i++) { 
            Content::create([
                'section_id' => 1,
                'order'     => 'AA',
                'image'     => 'images/home/slider.png',
                'content_1' => 'Somos fabricantes por excelencia de puntillas',
                'content_2' => '<p>Contamos una amplia variedad de puntillas de algodón y poliéster.</p>',
            ]);
        }

        Content::create([
            'section_id'    => 2,
            'content_1'     => '<h3>Trabajamos con los mejores materiales y calidad</h3>',
        ]);

        Content::create([
            'section_id'    => 3,
            'order'         => 'AA',
            'image'         => 'images/home/Group3760.png',
            'content_1'     => '<h3>Algodón 100%</h3>',
            'content_2'     => '<p>100% de calidad, tiene una textura rígida, cumple con los más altos estándares de calidad.</p>',
        ]);

        Content::create([
            'section_id'    => 3,
            'order'         => 'BB',
            'image'         => 'images/home/Group3761.png',
            'content_1'     => '<h3>Poliéster</h3>',
            'content_2'     => '<p>Mayor calidad, mayor durabilidad y mejor uso. Cumple con todos los requisitos tanto en dureza, firmeza de color y textura.</p>',
        ]);

        Content::create([
            'section_id'    => 4,
            'image'     => 'images/company/2-DSC051771.png',
            'content_1' => 'Empresa',
            'content_2' => '¿Quienes somos?',
            'content_3' => '<p>Ludetex, fábrica de puntillas nace con la intención de especializarse en la venta de puntillas elastizadas aptas teñido para fabricas, con distribución de productos exclusivos de alta calidad. </p>
            <p>Buscamos ofrecer un catalogo variado de diseños con multiples tonos originales.
            Se busca constantemente amplificar la diversidad de modelos de puntilla para que cada vez que tengas que comprar, tengas muchas opciones y no te conformes con poco. Si buscás revolucionar tus productos, definitivamente podemos ser tu solución. Nuestra actividad principal esta centrada en la elaboración y desarrollo de puntillas. Contamos con un amplio muestrario de diseños, diferentes anchos y la posibilidad de trabajar en colores exclusivos.</p>',
        ]);

        Content::create([
            'section_id'    => 5,
            'order'         => 'CC',
            'content_1'     => 'Materiales con los que trabajamos',
        ]);

        Content::create([
            'section_id'    => 6,
            'image'         => 'images/company/merceria_la_costura_bilbao_60211.png',
        ]);

        Content::create([
            'section_id'    => 7,
            'order'         => 'AA',
            'image'         => 'images/company/Group3765.png',
            'content_1'     => '<h3>Algodón 100%</h3>',
            'content_2'     => '<p>100% de calidad, tiene una textura rígida, cumple con los más altos estándares de calidad.</p>',
        ]);

        Content::create([
            'section_id'    => 7,
            'order'         => 'BB',
            'image'         => 'images/company/Group3761.png',
            'content_1'     => '<h3>Poliéster</h3>',
            'content_2'     => '<p>Mayor calidad, mayor durabilidad y mejor uso. Cumple con todos los requisitos tanto en dureza, firmeza de color y textura.</p>',
        ]);

        Content::create([
            'section_id'    => 8,
            'image'         => 'images/orders/Enmascarar_grupo_537.png',
        ]);

        Content::create([
            'section_id'    => 9,
            'image'         => 'images/news/Rectangle4145.png',
            'image2'        => 'images/news/Group3766.png',
            'content_1'     => 'Actualizamos nuestro Catálogo!',
            'content_2'     => '<p>Tenemos una gran variedad de colores en nuestos productos y ahora sumamos más!.</p><p>Producto fabricado con hilado poliester importado, lo que sumado a los más modernos telares de origen suizo, producen un artículo de alta calidad, para ser utilizado en los más diversos usos. 6 ANCHOS: Nº 1: 8 mm.; Nº 2: 12 mm.; Nº 3: 16 mm.; Nº 5: 25 mm.; Nº 9: 40 mm.; Nº 12: 50 mm.; lo que sumado a los más de 30 COLORES, dan una amplia gama de posibilidades de elección y combinación.</p>
            <p>La presentación es en rollos de 10 mts., individualizados con la característica etiqueta de color rojo, aunque también se puede fraccionar en rollos de mayor cantidad s/pedido.</p>',
            'content_3'     => 'CATÁLOGO'
        ]);
    }
}