<?php

namespace App\Http\Controllers;

use App\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class ContentController extends Controller
{
    public function content()
    {
        return null;
    }

    public function findContent($id)
    {
        $content = Content::find($id);
        return response()->json(['content' => $content]);
    }

    public function pdfNovedad($id)
    {
        $element = Content::findOrFail($id);  
        return Response::download($element->content_4);  
    }

    public function obtenerPolitica($id)
    {
        $element = Content::findOrFail($id);  
        return Response::download($element->image);  
    }


    public function fichaTecnica($id)
    {
        $element = Content::findOrFail($id);  
        return Response::download($element->extra);  
    }

    public function borrarFichaTecnica($id)
    {
        $element = Content::findOrFail($id); 
        
        if(Storage::disk('custom')->exists($element->content_4))
            Storage::disk('custom')->delete($element->content_4);

        $element->content_4 = null;
        $element->save();

        return response()->json([], 200);
    }

    public function borrarImagenContenido($id)
    {
        $content = Content::findOrFail($id); 
        
        if(Storage::disk('custom')->exists($content->image))
            Storage::disk('custom')->delete($content->image);

        $content->image = null;
        $content->save();

        return response()->json([], 200); 
    }

    public function descargarFormato()
    {
        if (Storage::disk('custom')->exists('images/formato.xls'))
            return Response::download('images/formato.xls', 'formato.xls'); 
        else
            return back(); 
    }
}
