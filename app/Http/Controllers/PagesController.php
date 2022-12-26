<?php

namespace App\Http\Controllers;

use SEO;
use App\Data;
use App\Page;
use App\Color;
use App\Content;
use App\Product;
use App\Category;
use App\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PagesController extends Controller
{
    private $data;

    public function __construct()
    {
        $this->data = Data::first();
    }

    public function home()
    {
        $page = Page::where('name', 'inicio')->first();
        SEO::setTitle('home');
        SEO::setDescription(strip_tags($this->data->description));

        /** Secciones de página */
        $sections   = $page->sections;
        $section1s  = $sections->where('name', 'section_1')->first()->contents()->orderBy('order', 'ASC')->get();
        $section2   = $sections->where('name', 'section_2')->first()->contents()->first();
        $section3s  = $sections->where('name', 'section_3')->first()->contents()->orderBy('order', 'ASC')->get();
        $products   = Product::where('outstanding', 1)->orderBy('order', 'ASC')->take(4)->get();
        $posts      = Content::where('section_id', 9)->orderBy('created_at', 'ASC')->take(3)->get();
        return view('paginas.index', compact('section1s', 'section2', 'section3s', 'products', 'posts'));
    }

    public function empresa()
    {
        $page = Page::where('name', 'empresa')->first();
        $sections = $page->sections;
        $section1 = $sections->where('name', 'section_1')->first()->contents()->first();
        $section2 = $sections->where('name', 'section_2')->first()->contents()->first();
        $section3 = $sections->where('name', 'section_3')->first()->contents()->first();
        $section4s = $sections->where('name', 'section_4')->first()->contents()->orderBy('order', 'ASC')->get();
        SEO::setTitle('empresa');
        return view('paginas.empresa', compact('section1', 'section2', 'section3', 'section4s'));
    }

    public function categorias()
    {
        $categories = Category::orderBy('order', 'ASC')->get();    
        $products   = Product::orderBy('order', 'ASC')->take(20)->get();
        SEO::setTitle('categor&iacute;as');    
        SEO::setDescription(strip_tags($this->data->description));
        return view('paginas.categorias', compact('categories', 'products'));
    }

    public function subCategoria($id)
    {
        $categories = Category::orderBy('order', 'ASC')->get();    
        $subCategoria = SubCategory::findOrFail($id);
        $products   = $subCategoria->products()->orderBy('order', 'ASC')->get();
        SEO::setTitle($subCategoria->name);    
        SEO::setDescription(strip_tags($this->data->description));
        return view('paginas.productos-por-categoria', compact('categories', 'products', 'subCategoria'));
    }

    public function producto(Request $request, Product $product)
    {
        if ($product){
            SEO::setTitle($product->name);
            SEO::setDescription(strip_tags($product->description));
        }

        $relatedProducts = $product->subCategory->products()->where('id', '<>', $product->id)->get();
        return view('paginas.producto', compact('product', 'relatedProducts'));
    }

    public function pedidos(Request $request)
    {
        $categories  = Category::orderBy('order', 'ASC')->get();
        SEO::setTitle('pedidos');    
        SEO::setDescription(strip_tags($this->data->description));

        return view('paginas.cotizacion', compact('categories'));
    }
    
    public function novedades(Request $request)
    {
        SEO::setTitle('novedades');
        $posts = Content::where('section_id', 9)->orderBy('created_at', 'ASC')->get();
            
        return view('paginas.novedades', compact('posts'));
    }

    public function obtenerNovedad($id)
    {
        $post = Content::find($id);
        SEO::setTitle($post->content_1);
        return view('paginas.novedad', compact('post'));
    }


    public function contacto()
    {
        $page = Page::where('name', 'contacto')->first();
        SEO::setTitle("Contacto"); 
        SEO::setDescription(strip_tags($this->data->description));      
        return view('paginas.contacto');
    }

    public function catalogo($id)
    {
        $element = Content::findOrFail($id);  
        return Response::download($element->content_2);  
    }
}
