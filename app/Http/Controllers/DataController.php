<?php

namespace App\Http\Controllers;

use App\Data;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataController extends Controller
{
    public function content(){
        $company_id = Company::first()->id;
        $data = Data::first();    
        return view('administrator.data.content', compact('company_id', 'data'));
    }

    public function update(Request $request)
    {
        $data = Data::find($request->input('id'));
        $dataNew = $request->all();

        if($request->hasFile('logo_header')){
            if(Storage::disk('custom')->exists($data->logo_header)){
                Storage::disk('custom')->delete($data->logo_header);
            }
            $dataNew['logo_header'] = $request->file('logo_header')->store('images/data', 'custom');
        }

        if($request->hasFile('logo_footer')){
            if(Storage::disk('custom')->exists($data->logo_footer)){
                Storage::disk('custom')->delete($data->logo_footer);
            }
            $dataNew['logo_footer'] = $request->file('logo_footer')->store('images/data', 'custom');
        }
        
        $data->update($dataNew);

        return back()->with('mensaje', 'Datos de empresa actualizados');

    }
}
