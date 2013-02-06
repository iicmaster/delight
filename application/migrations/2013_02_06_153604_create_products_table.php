<?php

class Create_Products_Table 
{    
	public function up()
    {
		Schema::create('products', function($table) {
			$table->increments('id');
			$table->integer('owner_id')->unsigned();
			$table->string('name', 255);
			$table->string('description', 255)->nullable();
			$table->string('image', 255)->nullable();
			$table->string('unit', 255)->nullable();
			$table->integer('total')->unsigned()->default(0);
			$table->integer('min_stock')->unsigned()->default(0);
			$table->integer('max_stock')->unsigned()->default(0);
			$table->integer('min_order')->unsigned()->default(0);
			$table->decimal('retail_price', 10, 2)->unsigned();
			$table->decimal('wholesale_price', 10, 2)->unsigned();
			$table->date('latest_transaction');
			$table->timestamps();

			$table->foreign('owner_id')->references('id')->on('users')->on_delete('cascade');
		});
    }    

	public function down()
    {
		Schema::drop('products');
    }
}