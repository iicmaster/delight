<?php

class Create_Material_Order_Items_Table 
{    
	public function up()
    {
		Schema::create('material_order_items', function($table) {
			$table->increments('id');
			$table->integer('material_order_id')->unsigned();
			$table->integer('material_id')->unsigned();
			$table->integer('supplier_id')->unsigned();
			$table->integer('ordered_quantity')->unsigned()->default(0);			
			$table->integer('approved_quantity')->unsigned()->default(0);
			$table->integer('price')->unsigned()->default(0);
			$table->timestamps();

			$table->foreign('material_order_id')->references('id')->on('material_orders')->on_delete('cascade');
			$table->foreign('material_id')->references('id')->on('materials')->on_delete('cascade');
			$table->foreign('supplier_id')->references('id')->on('suppliers')->on_delete('cascade');
		});
    }    

	public function down()
    {
		Schema::drop('material_order_items');
    }
}