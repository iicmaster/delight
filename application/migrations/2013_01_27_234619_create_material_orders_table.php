<?php

class Create_Material_Orders_Table 
{    
	public function up()
    {
		Schema::create('material_orders', function($table) {
			$table->increments('id');
			$table->string('description', 255)->nullable();
			$table->boolean('is_approved');
			$table->timestamps();
		});
    }    

	public function down()
    {
		Schema::drop('material_orders');
    }
}