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
        Schema::create('slave_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('master_file_id')->constrained()->on('master_files');
            $table->string('name')->nullable();
            $table->text('file');
            $table->string('extension');
            $table->decimal('size');
            $table->text('description')->nullable();
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
        Schema::dropIfExists('slave_files');
    }
};
