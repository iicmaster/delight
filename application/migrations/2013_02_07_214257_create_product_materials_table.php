<?php

class Create_Product_Materials_Table 
{    
	public function up()
    {
		Schema::create('product_materials', function($table) {
			$table->increments('id');
			$table->integer('product_id')->unsigned();
			$table->integer('material_id')->unsigned();
			$table->decimal('quantity', 10, 4)->unsigned();
			$table->timestamps();

			$table->foreign('product_id')->references('id')->on('products')->on_delete('cascade');
			$table->foreign('material_id')->references('id')->on('materials')->on_delete('cascade');
		});
    }    

	public function down()
    {
		Schema::drop('product_materials');
    }
}