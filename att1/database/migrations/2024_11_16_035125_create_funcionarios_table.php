<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();  // Cria o campo id com auto incremento
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('telefone', 15)->nullable();
            $table->foreignId('departamento_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('cargo_id')->constrained()->onDelete('cascade');
            $table->foreignId('turno_id')->nullable()->constrained()->onDelete('set null');
            $table->timestamps();  // Cria os campos created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funcionarios');
    }
};
