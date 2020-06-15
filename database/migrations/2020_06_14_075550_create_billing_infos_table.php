<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->strings('firstname');
            $table->strings('lastname');
            $table->integer('phone');
            $table->strings('email');
            $table->strings('address');
            $table->strings('city');
            $table->int('user_id');
              $table->strings('message');
              $table->string('payment_type');


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
        Schema::dropIfExists('billing_infos');
    }
}
