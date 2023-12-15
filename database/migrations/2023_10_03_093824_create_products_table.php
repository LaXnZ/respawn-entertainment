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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string("short_description")->nullable();
            $table->text("description")->nullable();
            $table->decimal("regular_price",8,2);
            $table->decimal("sale_price",8,2)->nullable();
            $table->string('SKU');
            $table->enum('stock_status',['instock','outofstock']);
            $table->boolean('featured')->default(false); 
            $table->unsignedInteger('quantity')->default(10);
            $table->string('image');
            $table->text('images')->nullable();
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
