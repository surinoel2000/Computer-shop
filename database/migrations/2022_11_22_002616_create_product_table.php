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
        Schema::create('products', function (Blueprint $table) {
            $table->string('product_code',20);
            $table->string('brand_code',20);
            $table->string('category_code',20);
            $table->string('name_product')->nullable(false);
            $table->integer('price');//gia goc
            $table->string('thumbnail_url',500)->nullable();
            $table->integer('product_status');
            $table->text('description');//ghi chu
            // $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            // $table->integer('delete_status');

            $table->primary(['product_code']);

        $table->foreign('brand_code') //cột khóa ngoại
            ->references('brand_code')->on('brands')
            ->onDelete('CASCADE')
            ->onUpdate('CASCADE');

        $table->foreign('category_code')
            ->references('category_code')->on('categories')
            ->onDelete('CASCADE')
            ->onUpdate('CASCADE');


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
