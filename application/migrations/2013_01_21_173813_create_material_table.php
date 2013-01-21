<?php

class Create_Material_Table 
{    
	public function up()
    {
		Schema::create('material', function($table) {
			$table->increments('id');
			$table->string('name', 255)->nullable();
			$table->string('description', 255)->nullable();
			$table->timestamps();
		});
    }    

	public function down()
    {
		Schema::drop('material');
    }
}