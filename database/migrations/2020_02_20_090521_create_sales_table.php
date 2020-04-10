<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id');
            $table->bigInteger('amount_sold');           
            $table->bigInteger('amount_paid');            
            $table->integer('user_id');
            $table->dateTime('nextPDate');
            $table->integer('otherCharges')->default(0);
            $table->integer('client_id');
            $table->bigInteger('balance');  
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
        Schema::dropIfExists('sales');
    }
}
