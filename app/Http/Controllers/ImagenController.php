<?php

namespace App\Http\Controllers;

use App\imagen;
use Illuminate\Http\Request;
use Validator;

class ImagenController extends Controller
{

public function inicio(){
    $imagenes = imagen::all(); 
    return view('inicio', compact('imagenes'));
}

public function guardarImg(Request $request){
        $this->validate($request, [
            'nombreImg' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

    if ($request->hasFile('nombreImg')) {
            $file = $request->file('nombreImg');  //ruta temporal
            $nombrearchivo = time()."_".$file->getClientOriginalName(); //Tengo el nombre Original de la Img....
            
            $destinoImagen = public_path('/fotos'); 
            $file->move($destinoImagen, $nombrearchivo);
        }
        
        $DataImg = new imagen([
            'nombreImg'=>$nombrearchivo
        ]);

        $DataImg->save();


        $imagenes = imagen::all(); 
        return view('inicio', compact('imagenes'));
    }



public function guardarImgTwo(Request $request){

        $image = $request->file('nombreImg'); //Ruta temporal de la Img
        $imageName = time().'.'.$image->extension(); //Nombre de la Img
        $destinoImagen = public_path('/fotos');
        $image->move($destinoImagen, $imageName);
        
        $DataImg = new imagen([
            'nombreImg'=>$imageName
        ]);

        $DataImg->save();

        $imagenes = imagen::all(); 

        return view('inicio')->with('imagenes',$imagenes);
    }

   
}
