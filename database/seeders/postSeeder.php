<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\poste;

class postSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $postes = [
            ['poste' => 'Directeur / Gérant',
             'salaire' => 6000000.00],
            ['poste' => 'Directeur adjoint',
             'salaire' => 5500000.00],
            ['poste' => 'Secrétaire de direction',
             'salaire' => 5000000.00],
            ['poste' => 'Responsable RH',
             'salaire' => 3800000.00],
            ['poste' => 'Gestionnaire RH',
             'salaire' => 3500000.00],
            ['poste' => 'Assistant RH',
             'salaire' => 3200000.00],
            ['poste' => 'Chargé de paie',
             'salaire' => 3600000.00],
            ['poste' => 'Responsable administratif',
             'salaire' => 4200000.00],
            ['poste' => 'Agent administratif',
             'salaire' => 3400000.00],
            ['poste' => 'Secrétaire',
             'salaire' => 3100000.00],
            ['poste' => 'Agent d\'accueil',
             'salaire' => 2800000.00],
            ['poste' => 'Responsable IT',
             'salaire' => 4800000.00],
            ['poste' => 'Développeur',
             'salaire' => 4500000.00],
            ['poste' => 'Technicien informatique',
             'salaire' => 3900000.00],
            ['poste' => 'Support IT',
             'salaire' => 3750000.00],
            ['poste' => 'Responsable commercial',
             'salaire' => 4700000.00],
            ['poste' => 'Commercial / Vendeur',
             'salaire' => 3500000.00],
            ['poste' => 'Chargé de clientèle',
             'salaire' => 3200000.00],
            ['poste' => 'Community manager',
             'salaire' => 3800000.00],
            ['poste' => 'Technicien',
             'salaire' => 3400000.00],
            ['poste' => 'Magasinier',
             'salaire' => 2900000.00],
            ['poste' => 'Chauffeur',
             'salaire' => 3150000.00],
            ['poste' => 'Agent de sécurité',
             'salaire' => 3250000.00],
            ['poste' => 'Agent de nettoyage',
             'salaire' => 2750000.00]
        ];
        foreach ($postes as $poste) {
            poste::create($poste);
        }
    }
}
