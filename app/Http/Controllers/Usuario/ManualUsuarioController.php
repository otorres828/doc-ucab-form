<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\ManualCategory;
use App\Models\ManualUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ManualUsuarioController extends Controller
{

    public function index()
    {
        $documentos = ManualUsuario::all();
        return view('usuario.index',compact('documentos'));
    }
  
    public function create()
    {
        $categorias = ManualCategory::orderBy('name','asc')->pluck('name','id');
        return view('usuario.create',compact('categorias'));
    }

    public function store(Request $request)
    {  
        $documento=ManualUsuario::create($request->all());
        if(isset($request->imagenes)){
            foreach ($request->imagenes as $image){
                $img = Image::where('path', $image)->first();
                if(strpos($documento->body,$image)){
                    $img->update([
                        'imageable_id'=>$documento->id,
                        'imageable_type'=>ManualUsuario::class
                    ]);
    
                }else{
                    Storage::delete($image);
                    $img->delete();
                }
            }
        }
       
        return redirect()->route('manual.usuario.index')->with('info','El documento se creo con exito');
    }
  
    public function edit(ManualUsuario $manual_usuario)
    {
        $categorias = ManualCategory::orderBy('name','asc')->pluck('name', 'id');
        return view('usuario.edit',compact('manual_usuario','categorias'));
    }

    public function update(Request $request, ManualUsuario $manual_usuario)
    {   
        $manual_usuario->update($request->all()); 

        if(isset($request->imagenes)){
            foreach ($request->imagenes as $image){
                $img = Image::where('path', $image)->first();
                if(strpos($manual_usuario->body,$image)){
                    $img->update([
                        'imageable_id'=>$manual_usuario->id,
                        'imageable_type'=>ManualUsuario::class
                    ]);
    
                }else{
                    Storage::delete($image);
                    $img->delete();
                }
            }
        }                     
        return redirect()->route('manual.usuario.index')->with('info','Se actualizo la documentacion');
    }

    public function destroy($id)
    {
       $doc = ManualUsuario::find($id);
       if(isset($doc->images)){
           foreach ($doc->images as $image){
                $img = Image::where('path', $image->path)->first();
                Storage::delete($image->path);
                $img->delete();
            }
       }
        $doc->delete();
        return redirect()->route('manual.usuario.index')->with('delete','La documentacion se elimino con exito');
    }
}
