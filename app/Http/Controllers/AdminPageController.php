<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminPageController extends Controller
{
    public function content()
    {
        $pages = Page::all();
        return view('administrator.page.content', compact('pages'));
    }

    public function update(Request $request)
    {
        try {
            foreach($request->input('pages') as $page) {
                $id = (int) $page['id'];
                $obj = Page::find($id);
                
                if($obj) 
                    $obj->update(['keywords' => $page['keywords']]);

                unset($obj);
            }
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
        }

        return back()->with('mensaje', 'Palabras actualizadas');
    }
}
