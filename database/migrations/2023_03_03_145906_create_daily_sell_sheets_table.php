<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailySellSheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_sell_sheets', function (Blueprint $table) {
            $table->id();
            $table->integer('item_id');
            $table->string('item_name');
            $table->integer('selling_price');
            $table->string('size');
            $table->integer('profit');
            $table->integer('pices_sold')->nullable();
            $table->integer('sells');
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
        Schema::dropIfExists('daily_sell_sheets');
    }
}
