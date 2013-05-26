<?php

class Create_Material_Transactions_Table 
{    
	public function up()
    {
		Schema::create('material_transactions', function($table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('product_order_id')->unsigned()->nullable();
			$table->integer('material_order_id')->unsigned()->nullable();
			$table->integer('material_order_item_id')->unsigned()->nullable();
			$table->integer('supplier_id')->unsigned()->nullable();
			$table->integer('material_id')->unsigned();
			$table->string('stock_code', 255);
			$table->string('description', 255)->nullable();
			$table->decimal('quantity', 10, 4);
			$table->decimal('price_per_unit', 10, 4)->unsigned()->nullable();
			$table->decimal('amount', 10, 4)->unsigned()->nullable();
			$table->timestamps();

			$table->foreign('user_id')->references('id')->on('users')->on_delete('cascade');
			$table->foreign('product_order_id')->references('id')->on('product_orders')->on_delete('cascade');
			$table->foreign('material_order_id')->references('id')->on('material_orders')->on_delete('cascade');
			$table->foreign('material_order_item_id')->references('id')->on('material_order_items')->on_delete('cascade');
			$table->foreign('material_id')->references('id')->on('materials')->on_delete('cascade');
			$table->foreign('supplier_id')->references('id')->on('suppliers')->on_delete('cascade');
		});
    }    

	public function down()
    {
		Schema::drop('material_transactions');
    }
}