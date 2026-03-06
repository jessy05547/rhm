<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\departement;

class departementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departements = [
            ['departement' => 'Ressources Humaines'],
            ['departement' => 'Informatique'],
            ['departement' => 'Commercial'],
            ['departement' => 'Production'],
            ['departement' => 'Logistique'],
            ['departement' => 'Finance'],
            ['departement' => 'Marketing'],
            ['departement' => 'Recherche et Développement'],
            ['departement' => 'Service Client'],
            ['departement' => 'Administration']
        ];
        foreach($departements as $dep){
            departement::create($dep);
        }
    }
}
