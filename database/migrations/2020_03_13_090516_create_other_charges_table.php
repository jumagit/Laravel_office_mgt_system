<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtherChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_charges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sale_id');
            $table->integer('chargeType');
            $table->integer('billType');
            $table->integer('gracePeriod');
            $table->bigInteger('agreedAmount');
            $table->dateTime('effectiveDate');
            $table->dateTime('enpDate');
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
        Schema::dropIfExists('other_charges');
    }
}
