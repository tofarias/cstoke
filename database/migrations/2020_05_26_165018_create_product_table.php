<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->references('id')->on('prod_category');
            $table->foreignId('manufacturer_id')->references('id')->on('prod_manufacturer');

            $table->string('name');
            $table->string('model');
            $table->longText('description')->nullable();
            $table->integer('lower_limit')->default(100);
            $table->string('sku')->unique();
            $table->integer('amount')->default(0);
            $table->boolean('active')->default(1);
            
            $table->foreignId('created_by')->references('id')->on('users');
            $table->foreignId('updated_by')->references('id')->on('users');

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
        Schema::dropIfExists('product');
    }
}
