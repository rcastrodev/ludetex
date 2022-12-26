<?php

namespace App\Http\Controllers;

use App\Data;
use App\Newsletter;
use App\Mail\QuoteEmail;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Mail\QuoteManualEmail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    
    public function quote(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'email'     => 'required|email:rfc,dns',
            'phone'     => 'required',
        ], [
            'name.required'     => 'Nombre es requerido',
            'email.required'    => 'Correo es requerido',
            'email.email'       => 'el correo de tener un formato valido',
            'phone.required'    => 'Teléfono es requerido',
        ]);

        $data = $request->all();

        if($request->hasFile('file'))
            $data['image'] = $request->file('file')->store('file_email', 'custom');

        $emails = [];
        $email = Data::first()->email;
        $email2 = Data::first()->email2;

        if ($email)
            $emails[] = $email;

        if($email2)
            $emails[] = $email2;
        
        try {
            Mail::to($emails)->send(new QuoteEmail($data));
            session()->forget('vps');
            $mensaje = 'Correo enviado, nuestro equipo se pondra en contacto con usted';
            $class = 'success';

        } catch (\Throwable $th) {
            $mensaje = 'Error al enviar correo';
            $class = 'danger';
            Log::error($th->getMessage());
        }

        return back()->with('mensaje', $mensaje)
            ->with('class', $class);
        
    } 

    public function quoteManual(Request $request)
    {
        $request->validate([
            'cliente'   => 'required',
            'correo'    => 'required|email:rfc,dns',
        ], [
            'cliente.required'  => 'Cliente es requerido',
            'correo.required'   => 'Correo es requerido',
            'correo.email'      => 'el correo de tener un formato valido',
        ]);

        $data = $request->all();
        $emails = [];

        $email = Data::first()->email;
        $email2 = Data::first()->email2;

        if ($email)
            $emails[] = $email;

        if($email2)
            $emails[] = $email2;
        
        try {
            Mail::to($emails)->send(new QuoteManualEmail($data));
            $mensaje = 'Correo enviado, nuestro equipo se pondra en contacto con usted';
            $class = 'success';

        } catch (\Throwable $th) {
            $mensaje = 'Error al enviar correo';
            $class = 'danger';
            Log::error($th->getMessage());
        }

        return back()->with('mensaje', $mensaje)
            ->with('class', $class);
        
    } 


    public function contact(Request $request)
    {
        $request->validate([
            'g-recaptcha-response' => 'required|captcha',
            'nombre'    => 'required',
            'telefono'    => 'required',
            'email'     => 'required|email:rfc,dns',
        ],[
            'g-recaptcha-response.required' => 'Debe validar que no es un robot',
            'g-recaptcha-response.captcha'  => 'Debe validar que no es un robot',
            'nombre.required'               => 'Nombre es requerido',
            'telefono.required'             => 'Teléfono es requerido',
            'email.required'                => 'Correo es requerido',
            'email.email'                   => 'Correo debe tener un formato valido',
        ]);

        $emails = [];

        $email = Data::first()->email;
        $email2 = Data::first()->email2;

        if ($email)
            $emails[] = $email;

        if($email2)
            $emails[] = $email2;

        $data = $request->all();

        if($request->hasFile('file'))
            $data['image'] = $request->file('file')->store('file_email', 'custom');
            
        try {
            Mail::to($emails)  
                ->send(new ContactMail($data));
            
            $mensaje = 'Correo enviado, nuestro equipo se pondra en contacto con usted';
            $class = 'success';

        } catch (\Throwable $th) {
            $mensaje = 'Error al enviar correo';
            $class = 'danger';
            Log::error($th->getMessage());
        }

        return back()
            ->with('mensaje', $mensaje)
            ->with('class', $class);
    }
}