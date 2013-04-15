<?php

class Create_Product_Orders_Table {    

	public function up()
    {
		Schema::create('product_orders', function($table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('name', 255);
			$table->string('tel', 255)->nullable();
			$table->string('address', 255)->nullable();
			$table->integer('location_id')->unsigned();
			$table->integer('shiping_fee')->unsigned();
			$table->integer('shiping_cost')->unsigned();
			$table->integer('total')->unsigned();
			$table->integer('grand_total')->unsigned();
			$table->integer('status')->unsigned();
			$table->timestamps();

			$table->foreign('user_id')->references('id')->on('users')->on_delete('cascade');
			$table->foreign('location_id')->references('id')->on('locations')->on_delete('cascade');
		});
    }    

	public function down()
    {
		Schema::drop('product_orders');
    }

}