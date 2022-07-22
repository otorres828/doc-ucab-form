<?php

namespace App\Http\Livewire;

use App\Models\Image;
use App\Models\ManualCategory;
use App\Models\ManualUsuario;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;

class UsuarioCreate extends Component
{
    public $images=[];
    public $body;
    public $name;
    public $slug;
    public $category;
    public $manual_usuario;
    public $imageneseditar=[];

    public function mount($categorias, $manual_usuario=null,$imageneseditar = null)
    {
        $this->categorias = $categorias;
        $this->manual_usuario = $manual_usuario;
        $this->imageneseditar = $imageneseditar;
    }

    public function render()
    {
        return view('livewire.usuario-create');
    }

    public function addImage($image){
        $this->images[] = $image;
    }

    // public function save(){
    //     if($this->category == null){
    //         $this->category=ManualCategory::first()->id;
    //     }
    //     $this->validate(['name'=>'required','body'=>'required']);
    //     $documento=ManualUsuario::create([
    //         'name' => $this->name,
    //         'slug' => Str::slug($this->name),
    //         'body' => $this->body,
    //         'category_id' => $this->category
    //     ]);

    //     foreach ($this->images as $image){
    //         $img = Image::where('path', $image)->first();
    //         if(strpos($documento->body,$image)){
    //             $img->update([
    //                 'imageable_id'=>$documento->id,
    //                 'imageable_type'=>ManualUsuario::class
    //             ]);

    //         }else{
    //             Storage::delete($image);
    //             $img->delete();
    //         }
    //     }

    //     return redirect()->route('manual.usuario.index')->with('info','El documento se creo con exito');
    // }
}
