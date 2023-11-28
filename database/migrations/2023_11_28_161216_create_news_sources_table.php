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
        Schema::create('news_sources', function (Blueprint $table) {
            $table->id();
            $table->string('url', 255)->nullable(false);
            $table->string('name', 200)->nullable(false);
            $table->unsignedBigInteger('fk_category_id')->nullable(false);
            $table->unsignedBigInteger('fk_user_id')->nullable(false);
            $table->timestamps();

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
        Schema::dropIfExists('news_sources');
    }
};
