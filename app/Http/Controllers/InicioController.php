<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class InicioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inicio(){

        $images = Image::orderBy('id','desc')->paginate(5);
        
      
        return view('dashboard',[
            'images' => $images
        ]);
    }
    public function mensaje(){
        return view('mensaje');
    }
   
}
