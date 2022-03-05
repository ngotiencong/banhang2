<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('desc');
            $table->longText('detail');
            $table->tinyInteger('status');
            $table->bigInteger('account_id')->unsigned();
            $table->bigInteger('blog_category_id')->unsigned();
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->foreign('blog_category_id')->references('id')->on('blog_categories');
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
        Schema::dropIfExists('blogs');
    }
}
