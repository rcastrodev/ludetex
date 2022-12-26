<?php

namespace App\Http\Controllers;

use App\Color;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Storage;

class ColorController extends Controller
{
    public function content()
    {
        return view('administrator.color.content');
    }

    public function store(Request $request)
    {
        $data = $request->all();        
        Color::create($data);

        return response()->json(['tableReload' => true],201);
    }

    public function update(Request $request)
    {
        $element = Color::find($request->input('id'));
        $data = $request->all();     

        $element->update($data);
    }

    public function findContent($id)
    {
        $content = Color::find($id);
        return response()->json(['content' => $content]);
    }

    public function destroy($id)
    {
        $element = Color::find($id);
        $element->delete();
        return response()->json([], 200);
    }

    /**
     * @author Raul castro
     * @return datatable
     */

    public function sliderGetList()
    {
        $elements = Color::all();
        return DataTables::of($elements)
        ->editColumn('hexa', function($element){
                return '<div style="background-color:'.$element->hexa.'; width:25px; height:25px;"></div>';

        })
        ->addColumn('actions', function($element) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContent('.$element->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$element->id.')" title="Eliminar element"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'hexa'])
        ->make(true);
    }
}
