<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('sub_cat_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();

            $table->string('name');
            $table->string('code');
            $table->longText('description');
            $table->double('regular_price', 8, 2);
            $table->double('sale_price', 8, 2)->nullable();
            $table->integer('quantity')->default(1);
            $table->text('short_description')->nullable();
            $table->string('product_thumbnail');
            $table->string('featured_product')->default('no');
            $table->timestamps();

            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('sub_cat_id')->references('id')->on('sub_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
