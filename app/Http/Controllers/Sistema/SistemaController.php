<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Document;
use App\Models\ManualCategory;

class SistemaController extends Controller
{
    
    public function principal(){
        $categoriasUsuarios=ManualCategory::all();
        $categorias = Category::all();
        return view('sistema.principal',compact('categorias','categoriasUsuarios'));
        
    }
    public function show($slug){
        $cat = Category::where('slug', $slug)->first();
        $categorias = Category::all();
        $documentos = Document::where('category_id', $cat->id)->get();
        $m=1;
        return view('sistema.mostrar',compact('categorias','documentos','m','cat'));
        
    }
}
