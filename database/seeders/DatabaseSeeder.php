<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // 1. Prima creiamo l'Admin e le Categorie
        $this->call([
            AdminSeeder::class,
            CategorySeeder::class,
        ]);

        // 2. Poi creiamo i 50 libri finti all'istante!
        \App\Models\Book::factory(50)->create();
    }
}
