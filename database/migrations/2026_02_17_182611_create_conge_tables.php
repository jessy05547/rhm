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
        Schema::create('conge_tables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_utilisateur')
                ->constrained('utilisateur')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('id_employe')
                ->constrained('employe')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->date('date_sortie');
            $table->date('date_entre');
            $table->string('types');
            $table->string('validation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conge_tables');
    }
};
