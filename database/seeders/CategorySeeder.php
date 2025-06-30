<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Narrativa', 'description' => 'Romanzi e racconti di vario genere'],
            ['name' => 'Saggistica', 'description' => 'Libri di approfondimento e studio'],
            ['name' => 'Scienze', 'description' => 'Testi scientifici e divulgativi'],
            ['name' => 'Storia', 'description' => 'Libri di storia e biografie'],
            ['name' => 'Arte', 'description' => 'Libri su arte, fotografia e design'],
            ['name' => 'Informatica', 'description' => 'Manuali e guide tecniche'],
            ['name' => 'Cucina', 'description' => 'Ricette e guide culinarie'],
            ['name' => 'Viaggi', 'description' => 'Guide turistiche e racconti di viaggio'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
