<?php

namespace App\Http\Controllers;

use App\Models\Comment;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function save(Request $request){


        $image_id = $request->input('image_id');
        
        $content = $request->input('comentario');

        $user = Auth::user();

        $comment = new Comment();

        $comment->user_id = $user->id;
        $comment->image_id = $image_id;
        $comment->content = $content;

        $comment->save();
    
        

        return redirect()->route('img-detalles',['user' => $comment->images->users->name, 'id' => $image_id]);



    }
    public function delete($id){
       
        //El usuario en sesion
        $user= Auth::user();

        //Buscamos el comentario asociado a la imagen}
        $comment = Comment::find($id);

        //Comprobar si el comentario pertenece al usuario en sesion

        if($user && ($comment->user_id == $user->id || $comment->images->id == $user->id)){
            $comment->delete();
            return redirect()->route('img-detalles',['user' => $comment->images->users->name, 'id' => $comment->images->id]);

        }
        else{
            return redirect()->route('img-detalles',['user' => $comment->images->users->name, 'id' => $comment->images->id])->with('status','No se elimino');
        }



    }
    



}
