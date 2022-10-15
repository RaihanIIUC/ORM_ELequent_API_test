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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained()->on('items');
            $table->string('code')->nullable();
            $table->string('country')->nullable();
            $table->text('address_1')->nullable();
            $table->text('address_2')->nullable();
            $table->text('city')->nullable();
            $table->text('state');
            $table->text('zone');
            $table->text('zip_code');
            $table->text('lat');
            $table->text('lng');
            $table->text('type');
            $table->foreignId('user_id')->constrained()->on('users');
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
        Schema::dropIfExists('locations');
    }
};

