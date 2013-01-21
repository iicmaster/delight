<?php

class Create_Supplier_Table 
{    
	public function up()
    {
		Schema::create('suppliers', function($table) {
			$table->increments('id');
			$table->string('name', 255)->nullable();
			$table->string('address', 255)->nullable();
			$table->string('tel', 255)->nullable();
			$table->string('contact', 255)->nullable();
			$table->string('contact_tel', 255)->nullable();
			$table->timestamps();
		});
    }    

	public function down()
    {
		Schema::drop('supplier');
    }
}