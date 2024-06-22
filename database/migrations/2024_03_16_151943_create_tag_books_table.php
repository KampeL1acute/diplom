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
        Schema::create('tag_books', function (Blueprint $table) {

            $table->foreignId('tag_id')->nullable()->index()->constrained('tags');
            $table->foreignId('book_id')->nullable()->index()->constrained('books');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tag_books');
    }
};
