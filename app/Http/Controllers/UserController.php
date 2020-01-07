<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function config(){
        return view('user.config');
    }

    public function update(Request $request){
        // Conseguir usuario identificado
        $user = \Auth::user();
        $id = $user->id;

        //validación del formulario
        $validate = $this->validate($request, [
            'name' =>'required|string|max:255',
            'surname' =>'required|string|max:255',
            'nick' =>'required|string|max:255|unique:users,nick,'.$id,
            'email' =>'required|string|email|max:255|unique:users,email,'.$id,
        ]);

        // Recoger los datos del formulario
        $name = $request->input('name');
        $surname = $request->input('surname');
        $nick = $request->input('nick');
        $email = $request->input('email');

        // Asignar nuevos valores al objeto del usuario
        $user->name = $name;
        $user->surname = $surname;
        $user->nick = $nick;
        $user->email = $email;

        // Subir la imagen
        $image_path = $request->file('image_path');
        if($image_path){

            //poner nombre unico
            $image_path_name = time().$image_path->getClientOriginalName();

            //guardarla en la carpeta storage/app/users
            Storage::disk('users')->put($image_path_name, File::get($image_path));

            //setteo el nombre de la imagen en el objeto
            $user->image = $image_path_name;
        }

        // Ejecutar consulta y cambios en la base de datos
        $user->update();

        return redirect()->route('config')
            ->with(['message' => 'El usuario se ha actualizado correctamente']);
    }

    public function getImage($filename){
        $file = Storage::disk('users')->get($filename);
        return new Response($file, 200);
    }
}