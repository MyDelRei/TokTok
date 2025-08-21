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
        Schema::create('books', function (Blueprint $table) {
            $table->id('book_id');
        $table->string('title');
        $table->string('isbn')->unique();

        // Explicit FK reference to category_id
        $table->unsignedBigInteger('category_id');
        $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('cascade');

        $table->text('description')->nullable();

        // Explicit FK reference to author_id
        $table->unsignedBigInteger('author_id');
        $table->foreign('author_id')->references('author_id')->on('authors')->onDelete('cascade');

        $table->year('published_year');
        $table->integer('available_stock')->default(0);
        $table->timestamps();
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
