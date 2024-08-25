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
            // $table->foreignId('category_id')->constrained('posts');
            // $table->foreignId('author_id')->constrained('posts');
            $table->foreignId('author_id')->constrained('authors')->nullable()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained('categories')->nullable()->nullOnDelete();
            $table->string('title');
            $table->string('slug');
            $table->longText('content');
            $table->date('published_at')->nullable();
            $table->string('image')->nullable();
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
