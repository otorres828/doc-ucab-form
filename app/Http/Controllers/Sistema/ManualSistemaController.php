<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Document;
use Illuminate\Http\Request;

class ManualSistemaController extends Controller
{    
    public function index()
    {
        $documentos = Document::all();
        return view('sistema.index',compact('documentos'));
    }
  
    public function create()
    {
        $categorias = Category::orderBy('name','asc')->pluck('name', 'id');
        return view('sistema.create',compact('categorias'));
    }

    public function store(Request $request)
    {
        Document::create($request->all());
       
        return redirect()->route('manual.sistema.index')->with('info','El documento se creo con exito');
    }
  
    public function edit(Document $manual_sistema)
    {
        $categorias = Category::orderBy('name','asc')->pluck('name', 'id');
        return view('sistema.edit',compact('manual_sistema','categorias'));
    }

    public function update(Request $request, Document $manual_sistema)
    {   
        $manual_sistema->update($request->all());                      
        return redirect()->route('manual.sistema.index')->with('info','Se actualizo la documentacion');
    }

    public function destroy($id)
    {
       $doc = Document::find($id);
       $doc->delete();
        return redirect()->route('manual.sistema.index')->with('delete','La documentacion se elimino con exito');
    }
}
