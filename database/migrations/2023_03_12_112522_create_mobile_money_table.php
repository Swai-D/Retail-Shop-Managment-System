<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobileMoneyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobile_money', function (Blueprint $table) {
            $table->id();
            $table->string('m_pesa');
            $table->string('tigo_pesa');
            $table->string('airtel_money');
            $table->string('halo_pesa');
            $table->string('cash')->nullable();
            $table->string('pending')->nullable();
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
        Schema::dropIfExists('mobile_money');
    }
}
