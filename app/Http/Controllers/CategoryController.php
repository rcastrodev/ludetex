<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function content()
    {
        return view('administrator.category.content');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if($request->hasFile('image')) 
            $data['image'] = $request->file('image')->store('images/category', 'custom');
        
        if($request->has('outstanding')) 
            $data['outstanding']  = 1;
        else
            $data['outstanding']  = 0;

        Category::create($data);

        return response()->json(['tableReload' => true],201);
    }

    public function update(Request $request)
    {
        $element = Category::find($request->input('id'));
        $data = $request->all();
        
        if($request->hasFile('image')){
            if(Storage::disk('custom')->exists($element->image))
                Storage::disk('custom')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/category','custom');
        }        

        if ($request->has('outstanding')) 
            $data['outstanding']  = 1;
        else
            $data['outstanding']  = 0;

        $element->update($data);
    }

    public function findContent($id)
    {
        $content = Category::find($id);
        return response()->json(['content' => $content]);
    }

    public function destroy($id)
    {
        $element = Category::find($id);

        if(Storage::disk('custom')->exists($element->image))
            Storage::disk('custom')->delete($element->image);

        $element->delete();
        return response()->json([], 200);
    }

    /**
     * @author Raul castro
     * @return datatable
     */

    public function sliderGetList()
    {
        $sliders = Category::where('name', '<>', 'ESCALAS Y SACABOCADOS')
            ->where('name', '<>', 'PRODUCTO DIRECTO')
            ->orderBy('order', 'ASC');

        return DataTables::of($sliders)
        ->editColumn('image', function($slider){
            if ($slider->image) 
                return '<img src="'.asset($slider->image).'" class="img-fluid" style="max-width:100px">';
            
        })
        ->addColumn('actions', function($slider) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContent('.$slider->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$slider->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'image'])
        ->make(true);
    }

}
