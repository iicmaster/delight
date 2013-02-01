<?php

class Material_Order_Item extends Eloquent 
{
	public function material()
	{
		return $this->belongs_to('Material');
	}
	
	// --------------------------------------------------------------------------

	public function supplier()
	{
		return $this->belongs_to('Supplier');
	}
	
	// --------------------------------------------------------------------------
}