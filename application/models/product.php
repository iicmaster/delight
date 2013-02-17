<?php

class Product extends Eloquent 
{
	public function materials()
	{ 
		return $this->has_many_and_belongs_to('material', 'product_materials');
	}
}