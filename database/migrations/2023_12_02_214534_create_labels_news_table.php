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
        Schema::create('labels_news', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_label_id')->nullable(false);
            $table->unsignedBigInteger('fk_news_id')->nullable(false);
            $table->timestamps();

            $table->foreign('fk_label_id')
            ->references('id')
            ->on('labels')
            ->onDelete('cascade')
            ->onUpdate('restrict');

            $table->foreign('fk_news_id')
            ->references('id')
            ->on('news')
            ->onDelete('cascade')
            ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('labels_news');
    }
};
