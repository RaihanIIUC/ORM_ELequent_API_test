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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('item_type');
            // $table->sring('location');  location_id
            $table->boolean('tradeable')->default(true);
            $table->foreignId('user_id')->constrained()->on('users');
            $table->string('status')->default('pending');
            $table->string('is_active')->default('true');
            // $table->sring('file'); file 
            // $table->sring('product'); file 
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
        Schema::dropIfExists('items');
    }
};
