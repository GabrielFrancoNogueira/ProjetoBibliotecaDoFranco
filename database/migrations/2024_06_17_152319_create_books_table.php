<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('author');
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('edition')->nullable();
            $table->string('publisher')->nullable();
            $table->year('publication_year')->nullable();
            $table->timestamps();
    
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
    

   
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
