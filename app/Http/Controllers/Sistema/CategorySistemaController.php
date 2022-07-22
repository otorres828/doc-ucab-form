<?php
namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySistemaController extends Controller
{
    
    public function index()
    {
        $categories=Category::all();
        return view('categoria.index',compact('categories'));
    }

    public function create(){
        return view('categoria.create');
    }

    public function edit(Category $categoria){
        return view('categoria.edit',compact('categoria'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'slug'=>'required'
         ]);
        $category = Category::create([
            'name'=>$request['name'],
            'slug'=>Str::slug($request['name'])
        ]);
        return redirect()->route('category.index')->with('info','La categoria '.$category->name.' se creo con exito');
    }
 
    public function update(Request $request, Category $categoria)
    {
        $request->validate([
            'name'=>'required',
            'slug'=>'required'
        ]);
       
        $categoria->update($request->all());
        return redirect()->route('category.index')->with('info','La categoria se actualizo con exito');

    }

    
    public function destroy($id)
    {
        $category= Category::find($id);
        $category->delete();
        return redirect()->route('category.index')->with('delete','La categoria se elimino con exito');
    }


}




