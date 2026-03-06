<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\role;

class roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['nom_role' => 'Administrateur'],
            ['nom_role' => 'Responsable RH'],
            ['nom_role' => 'Directeur SI'],
            ['nom_role' => 'Employé']
        ];
        foreach($roles as $rol){
            role::create($rol);
        }
    }
}
