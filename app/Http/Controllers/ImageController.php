<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function upload(){
        return view('img.upload');
    }
    public function save(Request $request){

        $request->validate([
            'image' => ['required','image'],
        ]);
        //recoger datos
        $image_path = $request->file('image');
        $description = $request->input('description');

        //idenntificar usuario y almacenar descripcion

        $user = Auth::user();
        $image = new Image();
        $image->user_id = $user->id;
        $image->description = $description;

        //subir fichero
        if($image_path){
            $image_path_name = time().'.'.$image_path->extension();
            Storage::disk('images')->put($image_path_name, File::get($image_path));
            $image->image_path = $image_path_name;
        }

        $image->save();
        
        return redirect()->route('dashboard')->with('status', 'Profile updated!');
        //aun me falta encontrar la forma de Enviar status con redirect
          
    }

    public function getImage($filename){
        $file = Storage::disk('images')->get($filename);
        return new Response($file, 200);
    }
    public function detalles($user, $id){

        $images = Image::find($id);
        return view("img.detalles",[
            
            'user' => $user,
            'i' => $images
        ]);
    }

    public function delete($id){

    
               //El usuario en sesion
               $user= Auth::user();

               //Buscamos el comentario asociado a la imagen}
               $image = Image::find($id);
       
               //Comprobar si el comentario pertenece al usuario en sesion
       
               if($user && ($image->user_id == $user->id)){
                   $image->delete();
                   return redirect()->route('dashboard')->with('status','Se ha eliminado exitosamente la imagen');
       
               }
               else{
                
                   return redirect()->route('dashboard')->with('status','No se ha podido eliminar la imagen');
               }
       
    }

}
