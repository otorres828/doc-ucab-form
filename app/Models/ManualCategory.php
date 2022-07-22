<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManualCategory extends Model
{
    use HasFactory;
    //asignacion masiva
    protected $fillable =['name','slug'];
    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    
    //relacion uno a muchos
    public function manual(){
        return $this->hasMany(ManualUsuario::class);
    }
}
