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
        $table->increments('id');
        $table->string('title');
        $table->string('description');
        $table->text('content');
        $table->string('image');
        $table->integer('category_id');
        $table->string('price');
        $table->string('created_by');
         $table->string('thumb_image')->default('');
         $table->string('list_image')->default('');
         $table->integer('view_count')->default(0);
         $table->boolean('hot_news');
         $table->boolean('status');
        $table->timestamp('published_at')->nullable() ;
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
}
