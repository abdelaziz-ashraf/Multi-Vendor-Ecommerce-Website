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
            $table->string('name');
            $table->string('slug');
            $table->string('thump_image');
            $table->foreignId('vendor_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('subcategory_id')->nullable()->constrained('sub_categories')->onDelete('cascade');
            $table->foreignId('childcategory_id')->nullable()->constrained('child_categories')->onDelete('cascade');
            $table->foreignId('brand_id')->constrained('brands')->onDelete('cascade');
            $table->string('description');
            $table->integer('quantity');
            $table->string('sku')->nullable();
            $table->double('price');
            $table->double('offer_price');
            $table->date('offer_start_date');
            $table->date('offer_end_date');
            $table->enum('type', ['new', 'top', 'featured', 'best'])->default('new');
            $table->enum('status', ['active', 'archive'])->default('active');
            $table->enum('approval_status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();

            $table->timestamps();
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
