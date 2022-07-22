<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ManualCategory;
use App\Models\ManualUsuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function show($slug){
        $cat = ManualCategory::where('slug', $slug)->first();
        $categorias = ManualCategory::all();
        $documentos = ManualUsuario::where('category_id', $cat->id)->get();
        $m=0;
        return view('usuario.mostrar',compact('categorias','documentos','m','cat'));

    }

    public function principal(){
        $categorias = ManualCategory::all();
        $categoriasSistema=Category::all();
        return view('usuario.principal',compact('categorias','categoriasSistema'));

    }
}
