<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_detials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id');
            $table->foreignId('product_id');
            $table->foreignId('product_background_id')->nullable();
            $table->foreignId('product_size_id')->nullable();
            $table->foreignId('font_id')->nullable();
            $table->foreignId('color_id')->nullable();
            $table->string('random_color')->nullable();
            $table->tinyInteger('has_text')->nullable();
            $table->string('text')->nullable();
            $table->string('text_position')->nullable();
            $table->string('layout_direction')->nullable();
            $table->string('image_process')->nullable();
            $table->string('month_start')->nullable();
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
        Schema::dropIfExists('order_detials');
    }
}
