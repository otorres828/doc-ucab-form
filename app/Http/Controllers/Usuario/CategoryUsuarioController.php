<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Models\ManualCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryUsuarioController extends Controller
{

    public function index()
    {
        $categories=ManualCategory::all();
        return view('categoria.usuario.index',compact('categories'));
    }
    public function create(){
        return view('categoria.usuario.create');
    }

    public function edit(ManualCategory $categoria){
        return view('categoria.usuario.edit',compact('categoria'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'slug'=>'required'
         ]);
        $category = ManualCategory::create([
            'name'=>$request['name'],
            'slug'=>Str::slug($request['name'])
        ]);
        return redirect()->route('manual.usuario.categoria.index')->with('info','La categoria '.$category->name.' se creo con exito');
    }
 
    public function update(Request $request, ManualCategory $categoria)
    {

        $request->validate([
            'name'=>'required',
            'slug'=>'required'
        ]);
       
        $categoria->update($request->all());
        return redirect()->route('manual.usuario.categoria.index')->with('info','La categoria se actualizo con exito');

    }

    
    public function destroy($id)
    {
        $category= ManualCategory::find($id);
        $category->delete();
        return redirect()->route('manual.usuario.categoria.index')->with('delete','La categoria se elimino con exito');
    }
}
