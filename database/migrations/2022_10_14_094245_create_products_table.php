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
            $table->foreignId('item_id')->constrained()->on('items');
            $table->text('title')->nullable();
            // ? $table->string('category_id')
            // ? $table->string('sub_category_id');
            $table->string('negotiable');
            $table->decimal('price', 9, 3);
            $table->string('condition');
            $table->text('description');
            $table->decimal('min_quantity');
            $table->date('validity');
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
        Schema::dropIfExists('products');
    }
};
