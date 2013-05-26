<?php

class User extends Eloquent 
{
	public function materials()
	{ 
		return $this->has_many_and_belongs_to('Materials', 'user_materials');
	}

}