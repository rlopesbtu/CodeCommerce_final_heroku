<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->decimal('total', 8,2);
			$table->smallInteger('status_id');
			$table->string('transaction_code')->nullable();  // código da transação
			$table->integer('payment_type_id')->nullable(); // tipo de pagamento
			$table->integer('netAmount')->nullable(); // valor líquido da transação
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
		Schema::drop('orders');
		Schema::dropForeign('orders_payment_type_id_foreign');
		Schema::dropColumn('payment_type_id');
		Schema::dropForeign('orders_statuses_id_foreign');
		Schema::dropColumn('netAmount');
		Schema::dropColumn('transaction_code');

	}

}
