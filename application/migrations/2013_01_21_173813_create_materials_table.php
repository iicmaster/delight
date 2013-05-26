<?php

class Create_Materials_Table 
{    
	public function up()
    {
		Schema::create('materials', function($table) {
			$table->increments('id');
			$table->string('name', 255);
			$table->string('description', 255)->nullable();
			$table->string('unit', 255)->nullable();
			$table->integer('min_stock')->unsigned()->default(0);
			$table->integer('max_stock')->unsigned()->default(0);
			$table->date('latest_transaction');
			$table->timestamps();
		});
    }    

	public function down()
    {
		Schema::drop('materials');
    }
}