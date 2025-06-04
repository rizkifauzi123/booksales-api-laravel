<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->integer('price');
            $table->integer('stock');
            $table->string('cover_photo');

            // tipe harus unsignedBigInteger karena merujuk ke authors.id
            $table->unsignedBigInteger('genre_id');
            $table->unsignedBigInteger('author_id');

            $table->timestamps();

            // Foreign key constraints
            $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};