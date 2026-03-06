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
        Schema::create('presence_tables', function (Blueprint $table) {
            $table->id();
            $table->string('statut', 100)->nullable();
            $table->datetime('check_in');
            $table->dateTime('check_out');
            $table->foreignId('id_utilisateur')
                ->constrained('utilisateur')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('id_employe')
                ->constrained('employe')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presence_tables');
    }
};
