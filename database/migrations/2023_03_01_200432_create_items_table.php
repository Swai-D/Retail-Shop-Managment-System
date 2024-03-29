<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->integer('buying_price');
            $table->integer('selling_price');
            $table->integer('pack')->nullable();
            $table->integer('pices');
            $table->string('expire_date');
            $table->string('intake_date');
            $table->string('item_category');
            $table->string('size');
            $table->integer('profit');
            $table->string('discount_price')->nullable();
            $table->string('item_image')->nullable();
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
        Schema::dropIfExists('items');
    }
}
