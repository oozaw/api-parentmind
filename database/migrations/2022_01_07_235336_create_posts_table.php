<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default('article');
            $table->string('title');
            $table->string('slug')->unique();
            $table->foreignId('category_id');
            $table->foreignId('user_id');
            $table->text('thumbnail')->nullable();
            $table->text('excerpt');
            $table->text('body');
            $table->string('source')->nullable();
            $table->string('link')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('posts');
    }
}