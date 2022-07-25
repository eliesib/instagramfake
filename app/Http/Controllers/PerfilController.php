<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function perfil($usuario){
        
        $user = User::where('usuario', $usuario)->first();


        return view('perfil.perfil',[
            'user' => $user
        ]);
    }
    public function configuracion(Request $request){
        $user = User::all();
        return view('perfil.configuracion', [
            'user' => $user
        ]);
    }
    public function update(Request $request){
        //id del usuario en sesion
        $id = Auth::user()->id;

        //validando los datos

        $request->validate([
            'name' => ['bail','required','string'],
            'surname' => ['string'],
            'usuario' => ['required','unique:users,usuario, '.$id],
            'image_path' => ['image']
        ]);
       

        //Recolecion de datos a actualizar
        $name = $request->input('name');
        $surname = $request->input('surname');
        $usuario= $request->input('usuario');
       

        //buscando el registro del usuario en la bade de datos
        $user = User::find($id);

        //Actualizando el registro
        $user->name = $name;
        $user->surname = $surname;
        $user->usuario = $usuario;

        //actualizacion de imagen del usuario
        $image_path = $request->file("image_path");
        if($image_path){
            //poner nombre unico a la imagen
            $image_path_name = time().'.'.$image_path->extension();
            
            //guardar en disco users en storage
            Storage::disk('users')->put($image_path_name, File::get($image_path));

            //Actualizar en los registros
            $user->image = $image_path_name;
        }
        

        

        //guardando los datos
        $user->save();
        Auth::login($user);
        return view('perfil.configuracion')->with('status','Registro actualizado correctamente');
    }

    public function getImage($filename){
        $file = Storage::disk('users')->get($filename);
        return new Response($file, 200);
    }
}
