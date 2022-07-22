<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Document;
use App\Models\ManualCategory;
use App\Models\ManualUsuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  
    public function run()
    {
        Category::factory(20)->create(); //categorias de sistema
        Document::factory(200)->create(); //documentos de sistema
        ManualCategory::factory(20)->create();
        ManualUsuario::factory(200)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
