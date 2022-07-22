<?php

namespace Database\Factories;

use App\Models\ManualCategory;
use App\Models\ManualUsuario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ManualUsuarioFactory extends Factory
{
    protected $model = ManualUsuario::class;

    public function definition()
    {
        $name =  $this->faker->text(20);
        return [
            'name'=>$name,
            'slug'=>Str::slug($name),
            'body'=>$this->faker->text(1500),
            'category_id'=>ManualCategory::all()->random()->id,
        ];
    }
}
