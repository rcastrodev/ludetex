<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemSessionController extends Controller
{
    function addVP(Request $request)
    {
        $vps = session('vps');
        $add = true; // Verificar
        // Si tiene valores
        if ($vps) {
            $main = array_search($request->id, $vps);
            if(! is_bool($main)){
                $vps[$request->id]['number'] =  abs($request->number);  
            }else{
                // Si tiene pero no coincide con ninguno 
                $vps[$request->id] = $request->all();
            }
        }else{
            $vps = [];
            $vps[$request->id] = $request->all();
        }
        session(['vps' => $vps]); 
        
        return response()->json([], 201);
    }

    public function getSession(Request $request)
    {   
        dd(session('vps'));
    }

    public function destroy($id)
    {
        $vps = session('vps');    
        unset($vps[$id]);
        session(['vps' => $vps]);  
        return response()->json([session('vps')], 200);
    }
}
