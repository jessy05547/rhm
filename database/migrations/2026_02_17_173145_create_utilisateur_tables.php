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
        Schema::create('utilisateur_tables', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 200)->nullable();
            $table->string('prenom', 200)->nullable();
            $table->string('cin', 12)->unique();
            $table->string('adresse', 200)->nullable();
            $table->string('email');
            $table->text('password');
            $table->foreignId('id_poste')
                ->constrained('poste')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('id_departement')
                ->constrained('departement')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->date('date_embauche');
            $table->date('date_naissance');
            $table->string('telephone', 20);
            $table->string('sexe', 30);
            $table->string('matricule', 8)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisateur_tables');
    }
};
