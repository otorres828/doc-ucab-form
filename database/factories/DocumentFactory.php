<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Document;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DocumentFactory extends Factory
{
    protected $model = Document::class;

    public function definition()
    {
        $name = $this->faker->text(20);
        return [
            'name'=>$name,
            'slug'=>Str::slug($name),
            'body'=>$this->faker->text(1500),
            'category_id'=>Category::all()->random()->id,
        ];
    }
}
