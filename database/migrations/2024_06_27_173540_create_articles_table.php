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
        Schema::create('articles', function (Blueprint $table) {
            $table->id(); // nome colonna: id, chiave primaria e auto_increment
            $table->unsignedBigInteger('user_id');
            $table->string('title', 150); // stringa (varchar) di massimo 150 caratteri
            $table->unsignedBigInteger('category_id');
            $table->string('description'); // di default 255 caratteri
            $table->text('body')->nullable(); // un campo testo molto lungo di cui non conosciamo lunghezza massima a priori
            $table->boolean('visible')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};