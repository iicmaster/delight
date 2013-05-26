<?php

class Material extends Eloquent 
{
	public function suppliers()
	{ 
		return $this->has_many_and_belongs_to('Supplier');
	}

	public function users()
	{ 
		return $this->has_many_and_belongs_to('User', 'user_materials');
	}
}