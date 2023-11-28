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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100)->nullable(false);
            $table->string('short_description', 200)->nullable(false);
            $table->string('image', 255);
            $table->string('permalink', 255)->nullable(false);
            $table->date('date')->nullable(false);
            $table->unsignedBigInteger('fk_news_sources_id')->nullable(false);
            $table->unsignedBigInteger('fk_user_id')->nullable(false);
            $table->unsignedBigInteger('fk_category_id')->nullable(false);
            $table->timestamps();

            $table->foreign('fk_news_sources_id')
                ->references('id')
                ->on('news_sources')
                ->onDelete('cascade')
                ->onUpdate('restrict');

            $table->foreign('fk_user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('restrict');

            $table->foreign('fk_category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
