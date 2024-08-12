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
         Schema::create('services', function (Blueprint $table) {
             $table->id();
             $table->string('name');
             $table->text('description')->nullable();
             $table->unsignedBigInteger('category_id'); // Убедитесь, что это поле правильно определено
             $table->integer('duration');
             $table->decimal('price', 8, 2);
             $table->timestamps();

             // Создание внешнего ключа
             $table->foreign('category_id')->references('id')->on('service_categories')->onDelete('cascade');
         });
     }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
