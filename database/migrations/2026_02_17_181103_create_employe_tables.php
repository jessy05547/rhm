<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employe_tables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_utilisateur')
                ->constrained('utilisateur')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('id_departement')
                ->constrained('departement')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('id_poste')
                ->constrained('poste')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('nom', 200);
            $table->string('prenom', 200);
            $table->date('date_naissance');
            $table->string('cin', 12)->unique();
            $table->date('date_embauche');
            $table->string('adresse');
            $table->string('email');
            $table->string('telephone', 20);
            $table->string('sexe');
            $table->string('matricule',8)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employe_tables');
    }
};
