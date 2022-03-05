<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->string('name', 255);
            $table->string('slug', 255);
            $table->bigInteger('price');
            $table->bigInteger('sale_price')->nullable()->default(0);
            $table->text('desc');
            $table->text('detail');
            $table->string('img', 255);
            $table->string('img_list', 255)->default("");
            $table->tinyInteger('status')->default(0);
            $table->bigInteger('category_id')->unsigned();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('category');
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
}
