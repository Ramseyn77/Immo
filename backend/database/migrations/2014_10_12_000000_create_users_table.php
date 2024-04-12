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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('age')->nullable() ;
            $table->string('password');
            $table->string('profession')->nullable() ;
            $table->string('telephone') ;
            $table->string('adresse') ;
            $table->string('numero_IFU')->nullable() ;
            $table->string('profil') ;
            $table->boolean('email_verified_at')->default(0);
            $table->string('status')->default(0) ;
            $table->rememberToken();
            $table->softDeletes() ;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
