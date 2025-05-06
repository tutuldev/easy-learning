<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');

            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('framework_id')->nullable()->constrained('frameworks')->onDelete('cascade');//nullable
            $table->foreignId('topic_id')->constrained('topics')->onDelete('cascade');
            $table->foreignId('structer_id')->constrained('structers')->onDelete('cascade');

            $table->text('code')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
