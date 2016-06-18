<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderPaymentTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_payment_types', function (Blueprint $table) {
            $table->increments('id');
             $table->string('name');
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
        Schema::drop('order_payment_types');
        Schema::dropForeign('orders_payment_type_id_foreign');
        Schema::dropColumn('payment_type_id');
        Schema::dropForeign('orders_statuses_id_foreign');
        Schema::dropColumn('netAmount');
        Schema::dropColumn('transaction_code');
    }
}
