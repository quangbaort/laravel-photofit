<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receivers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('first_name_furigana');
            $table->string('last_name_furigana');
            $table->string('zip_code');
            $table->string('city');
            $table->string('address');
            $table->string('orther_address');
            $table->string('building_room_number');
            $table->string('phone_number');
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
        Schema::dropIfExists('receivers');
    }
}
