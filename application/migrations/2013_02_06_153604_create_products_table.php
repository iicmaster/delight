<?php

class Create_Products_Table 
{    
	public function up()
    {
		Schema::create('products', function($table) {
			$table->increments('id');
			$table->string('name', 255);
			$table->string('description', 255)->nullable();
			$table->string('image', 255)->nullable();
			$table->string('unit', 255)->nullable();
			$table->string('size', 255);
			$table->integer('total')->unsigned()->default(0);
			$table->decimal('price', 10, 2)->unsigned();
			$table->date('latest_transaction');
			$table->timestamps();
		});
    }    

	public function down()
    {
		Schema::drop('products');
    }
}