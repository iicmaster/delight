<?php

class Create_Materials_Table 
{    
	public function up()
    {
		Schema::create('materials', function($table) {
			$table->increments('id');
			$table->integer('owner_id')->unsigned();
			$table->string('name', 255);
			$table->string('description', 255)->nullable();
			$table->string('unit', 255)->nullable();
			$table->integer('total')->unsigned()->default(0);
			$table->integer('min_stock')->unsigned()->default(0);
			$table->integer('max_stock')->unsigned()->default(0);
			$table->timestamps();
			$table->date('latest_transaction');

			$table->foreign('owner_id')->references('id')->on('users')->on_delete('cascade');
		});
    }    

	public function down()
    {
		Schema::drop('materials');
    }
}