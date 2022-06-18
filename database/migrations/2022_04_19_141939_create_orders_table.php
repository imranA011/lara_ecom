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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('invoice')->unique();
            $table->integer('subtotal');
            $table->integer('shipping')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('total');
            $table->string('payment_type');
            $table->enum('status', ['processing', 'on-hold', 'cancelled', 'completed', 'refunded', 'delete'])->default('processing');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
