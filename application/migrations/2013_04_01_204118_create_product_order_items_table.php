<?php

class Create_Product_Order_Items_Table {    

	public function up()
    {
		Schema::create('product_order_items', function($table) {
			$table->increments('id');
			$table->integer('product_order_id')->unsigned();
			$table->integer('product_id')->unsigned();
			$table->integer('price')->unsigned();
			$table->integer('quantity')->unsigned();
			$table->timestamps();

			$table->foreign('product_order_id')->references('id')->on('product_orders')->on_delete('cascade');
			$table->foreign('product_id')->references('id')->on('products')->on_delete('cascade');
		});
    }    

	public function down()
    {
		Schema::drop('product_order_items');
    }

}