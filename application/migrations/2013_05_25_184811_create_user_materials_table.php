<?php

class Create_User_Materials_Table {    

	public function up()
    {
		Schema::create('user_materials', function($table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('material_id')->unsigned();
			$table->integer('total')->unsigned()->default(0);
			$table->timestamps();

			$table->foreign('user_id')->references('id')->on('users')->on_delete('cascade');
			$table->foreign('material_id')->references('id')->on('materials')->on_delete('cascade');
		});
    }    

	public function down()
    {
		Schema::drop('user_materials');
    }

}