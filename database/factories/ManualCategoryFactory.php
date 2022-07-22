<?php

namespace Database\Factories;

use App\Models\ManualCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ManualCategoryFactory extends Factory
{
    protected $model = ManualCategory::class;

    public function definition()
    {
        $name=$this->faker->unique()->word('20');
        return [
            'name'=>$name,
            'slug'=>Str::slug($name)
        ];
    }
}
