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
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_usuario');

            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('id_livro')->nullable();

            $table->double('multa')->nullable();
            $table->unsignedTinyInteger('notificacao')->default(0);
            $table->unsignedTinyInteger('arquivado')->default(0);

            $table->foreign('id_livro')->references('id')->on('livros')->onDelete('set null')->onUpdate('cascade');
            $table->timestamp('data_limite');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emprestimos');
    }
};
