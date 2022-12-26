<?php

namespace App\Http\Controllers;

use App\Color;
use App\Product;
use App\Category;
use App\SubCategory;
use App\ProductPicture;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class ProductController extends Controller
{
    public function content()
    {
        return view('administrator.product.content');
    }

    public function create()
    {
        $subCategories = SubCategory::all();  
        $colores = Color::all();   
        return view('administrator.product.create', compact('subCategories', 'colores'));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();
        if($request->hasFile('extra')) 
            $data['extra'] = $request->file('extra')->store('images/data-sheet', 'custom');

        $product = Product::create($data);                
        
        if ($request->has('colores')) 
            $product->colores()->attach($request->input('colores'));
        
        if($request->hasFile('banner'))
            foreach($request->file('banner') as $image)
                $product->banner()->create(['image' => $image->store('images/products', 'custom')]);
            
        return redirect()
            ->route('product.content.edit', ['id' => $product->id])
            ->with('mensaje', 'Producto creado');

    }

    public function ImagesCreate(Request $request)
    {
        $product    = Product::find($request->input('product_id'));
        $data       = $request->all();

        if($request->hasFile('image'))
            $data['image'] = $request->file('image')->store('images/products', 'custom');

        $product->images()->create($data);

        return response()->json([], 201);
    }

    public function edit($id)
    {   
        $subCategories = SubCategory::all();  
        $colores = Color::all();
        $product = Product::findOrFail($id);
        $colorsMs = $product->colores;      
        return view('administrator.product.edit', compact('product', 'subCategories', 'colores', 'colorsMs'));
    }

    public function update(ProductRequest $request)
    {   
        $data = $request->all();
        $product = Product::find($request->input('id'));

        if($request->hasFile('extra')){
            if (Storage::disk('custom')->exists($product->extra))
                    Storage::disk('custom')->delete($product->extra);
            
            $data['extra'] = $request->file('extra')->store('images/data-sheet', 'custom');
        }

        $product->update($data);

        if($request->hasFile('banner')){
            foreach($request->file('banner') as $banner){
                $product->banner()->create([
                    'image' => $banner->store('images/products', 'custom')
                ]);
            }
        }

        $colores = $product->colores;
        if ($request->has('colores')) {
            if($request->input('colores')){
                $product->colores()->wherePivotNotIn('color_id', $request->input('colores'))->detach();
    
                foreach ($request->input('colores') as $color_id) {
                    if(! in_array($color_id, $colores->pluck('id')->toArray()))
                        $product->colores()->attach($color_id);
                }
            }else{
                $product->colores()->detach();
            }
        }else{
            $product->colores()->detach();
        }

        return back()->with('mensaje', 'Producto editado correctamente');
    }

    public function destroy($id)
    {
        Product::find($id)->delete();
    }

    public function find($id)
    {
        $content = Product::find($id);
        return response()->json(['content' => $content]);
    }

    public function getList()
    {
        $products = Product::orderBy('order', 'ASC');
        return DataTables::of($products)
        ->editColumn('characteristic', function($product) {
            return $product->characteristic;
        })
        ->addColumn('category', function($product) {
            return $product->subCategory->category->name;
        })
        ->addColumn('subCategory', function($product) {
            if ($product->subCategory->category->name != $product->subCategory->name) 
                return $product->subCategory->name;
            else 
                return '--';
            
        })
        ->addColumn('actions', function($product) {
            return '<a href="'.route('product.content.edit', ["id" => $product->id]).'" class="btn btn-sm btn-primary rounded-pill far fa-edit"></a><button class="btn btn-sm btn-danger rounded-pill" onclick="modalProductDestroy('.$product->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'characteristic'])
        ->make(true);
    }

    public function ImagesFind($id)
    {
        $element = ProductPicture::findOrFail($id);  
        return response()->json(['content' => $element]);
    }

    public function ImagesUpdate(Request $request)
    {
        $productPicture = ProductPicture::find($request->input('id'));
        $data           = $request->all();

        if($request->hasFile('image')){
            if (Storage::disk('custom')->exists($productPicture->image))
                    Storage::disk('custom')->delete($productPicture->image);
            
            $data['image'] = $request->file('image')->store('images/products', 'custom');
        }

        $productPicture->update($data);
        return response()->json([], 200);

    }

    public function ImagesDelete($id)
    {
        $productPicture = ProductPicture::find($id);
        
        if (Storage::disk('custom')->exists($productPicture->image))
            Storage::disk('custom')->delete($productPicture->image);

        $productPicture->delete();

        return response()->json([], 200);
    }

    public function ImagesGetList($id)
    {
        $productImages = Product::find($id)->images()->orderBy('order', 'ASC');
        return DataTables::of($productImages)
        ->editColumn('hexa', function($productImage) {
            if($productImage->color)
                return "<div style='width:80px; height:80px; background-color:". $productImage->color->hexa ."'></div>";
            else 
                return "Sin color asignado";
        })
        ->editColumn('color', function($productImage) {
            if($productImage->color)
                return $productImage->color->name;
        })
        ->editColumn('image', function($productImage) {
            if(Storage::disk('custom')->exists($productImage->image))
                return '<img src="'. asset($productImage->image) .'" style="width:80px; height:80px; object-fit: contain;">';
        })
        ->addColumn('actions', function($productImage) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContent2('.$productImage->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy2('.$productImage->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'hexa', 'image'])
        ->make(true);
    }

    public function borrarImagenDescriptiva($id)
    {
        $product = Product::findOrFail($id); 
        
        if(Storage::disk('custom')->exists($product->picture_description))
            Storage::disk('custom')->delete($product->picture_description);

        $product->picture_description = null;
        $product->save();

        return response()->json([], 200);
    }

    public function fichaTecnica($id)
    {
        $producto = Product::findOrFail($id);  
        return Response::download($producto->extra);  
    }

    public function borrarFichaTecnica($id)
    {
        $product = Product::findOrFail($id); 
        
        if(Storage::disk('custom')->exists($product->extra))
            Storage::disk('custom')->delete($product->extra);

        $product->extra = null;
        $product->save();

        return response()->json([], 200);
    }
}
