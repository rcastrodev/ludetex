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
            $table->unsignedBigInteger('sub_category_id');
            $table->string('name')->nullable();
            $table->text('characteristic')->nullable();
            $table->text('width')->nullable();
            $table->text('presentation_and_measurements')->nullable();
            $table->string('extra')->nullable();
            $table->string('order')->nullable();
            $table->tinyInteger('outstanding')->default(0);
            $table->timestamps();
            $table->foreign('sub_category_id')
                ->references('id')->on('sub_categories')->onDelete('cascade');
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
