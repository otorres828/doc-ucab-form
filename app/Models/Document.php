<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Document extends Model
{
    use HasFactory;

    protected $guarded =['id'];
    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'slug';
    } 

    //relacion uno a muchos inversa
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
