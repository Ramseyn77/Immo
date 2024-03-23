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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('name') ;
            $table->string('surface') ;
            $table->string('nbr_piece') ;
            $table->string('prix') ;
            $table->string('description') ;
            $table->string('departement') ;
            $table->string('ville') ;
            $table->string('quartier') ;
            $table->foreignId('user_id')->constrained()->onDelete('cascade') ;
            $table->foreignId('categorie_id')->constrained()->onDelete('cascade') ;
            $table->foreignId('type_id')->constrained()->onDelete('cascade') ;
            $table->string('photos') ;
            $table->softDeletes() ;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
