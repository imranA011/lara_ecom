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
        Schema::create('attribute_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('attribute_id')->onDelete('cascade');

            $table->string('item_name');
            $table->timestamps();

            $table->foreign('attribute_id')->references('id')->on('product_attributes');
            $table->dropForeign('attribute_items_attribute_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attribute_items');
    }
};
