<?php

namespace App\Http\Controllers;

use App\Content;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class NewsController extends Controller
{
    public function content()
    {
        return view('administrator.news.content');
    }

    public function create()
    {  
        return view('administrator.news.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if($request->hasFile('image')) 
            $data['image'] = $request->file('image')->store('images/news', 'custom');

        if($request->hasFile('image2')) 
            $data['image2'] = $request->file('image2')->store('images/news', 'custom');

        $element = Content::create($data);                    
        
        return redirect()
            ->route('news.content.edit', ['id' => $element->id])
            ->with('mensaje', 'Post creado');

    }

    public function edit($id)
    {   
        $post = Content::findOrFail($id);
        return view('administrator.news.edit', compact('post'));
    }

    public function update(Request $request)
    {   

        $data = $request->all();
        $element = Content::find($request->input('id'));
        
        if($request->hasFile('image')){
            if(Storage::disk('custom')->exists($element->image))
                Storage::disk('custom')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/news','custom');
        }   
        
        if($request->hasFile('image2')){
            if(Storage::disk('custom')->exists($element->image2))
                Storage::disk('custom')->delete($element->image2);
            
            $data['image2'] = $request->file('image2')->store('images/news','custom');
        }    

        $element->update($data);        
        return back()->with('mensaje', 'Post editado correctamente');
    }

    public function destroy($id)
    {
        $element = Content::find($id);

        if(Storage::disk('custom')->exists($element->image))
            Storage::disk('custom')->delete($element->image);
        
        $element->delete();
    }

    public function find($id)
    {
        $content = Content::find($id);
        return response()->json(['content' => $content]);
    }

    public function getList()
    {
        $elements = Content::where('section_id', 9);
        return DataTables::of($elements)
        ->editColumn('content_2', function($element) {
            return  Str::limit($element->content_2, 200);
        })
        ->addColumn('actions', function($element) {
            return '<a href="'.route('news.content.edit', ["id" => $element->id]).'" class="btn btn-sm btn-primary rounded-pill far fa-edit"></a><button class="btn btn-sm btn-danger rounded-pill" onclick="modalProductDestroy('.$element->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'content_2'])
        ->make(true);
    }

}
