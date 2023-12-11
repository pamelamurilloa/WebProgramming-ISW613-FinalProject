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

        Schema::dropIfExists('users');

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname', 50)->nullable(false);
            $table->string('lastname', 50)->nullable(false);
            $table->string('username', 50)->nullable(false);
            $table->string('password', 255)->nullable(false);
            $table->string('email',255)->nullable(false);
            $table->integer('cellphone')->nullable(false);
            $table->unsignedBigInteger('role_id')->default(2)->nullable(false);
            $table->timestamps();
            
            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
