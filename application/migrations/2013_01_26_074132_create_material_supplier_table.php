<?php

class Create_Material_Supplier_Table 
{    
	public function up()
    {
		Schema::create('material_supplier', function($table) {
			$table->increments('id');
			$table->integer('material_id')->unsigned();
			$table->integer('supplier_id')->unsigned();
			$table->timestamps();

			$table->foreign('material_id')->references('id')->on('materials')->on_delete('cascade');
			$table->foreign('supplier_id')->references('id')->on('suppliers')->on_delete('cascade');
		});
    }    

	public function down()
    {
		Schema::drop('material_supplier');
    }
}