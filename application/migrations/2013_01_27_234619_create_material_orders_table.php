<?php

class Create_Material_Orders_Table 
{    
	public function up()
    {
		Schema::create('material_orders', function($table) {
			$table->increments('id');
			$table->integer('owner_id')->unsigned();
			$table->string('description', 255)->nullable();
			$table->boolean('is_approved');
			$table->timestamps();
			
			$table->foreign('owner_id')->references('id')->on('users')->on_delete('cascade');
		});
    }    

	public function down()
    {
		Schema::drop('material_orders');
    }
}