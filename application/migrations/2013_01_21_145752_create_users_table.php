<?php

class Create_Users_Table {    

	public function up()
    {
		Schema::create('users', function($table) {
			$table->increments('id');
			$table->string('name', 255);
			$table->string('username', 255);
			$table->string('email', 255);
			$table->string('password', 255);
			$table->string('role', 255)->default('user');
			$table->string('address', 255)->nullable();
			$table->string('tel', 255)->nullable();
			$table->timestamps();
		});
    }    

	public function down()
    {
		Schema::drop('users');
    }

}