<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditorTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creditor_tables', function (Blueprint $table) {
            $table->id();
            $table->string('creditor_id');
            $table->string('creditor_name');
            $table->string('item_id');
            $table->string('item_name');
            $table->string('size');
            $table->string('pices_sold');
            $table->string('price');
            $table->string('total_cost');
            $table->string('balance_paid')->default(0);
            $table->string('remaining_balance')->default(0);
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
        Schema::dropIfExists('creditor_tables');
    }
}
