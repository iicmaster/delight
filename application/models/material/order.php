<?php

class Material_Order extends Eloquent 
{
	public function items()
	{ 
		return $this->has_many('Material_Order_Item');
	}
	
	// --------------------------------------------------------------------------

	public function get_status()
	{
		return $this->get_attribute('is_approved') ? 'Approved' : 'Waiting for approve';
	}

	// --------------------------------------------------------------------------

	public function get_status_label()
	{
		if ($this->get_attribute('is_approved')) {
			$label = '<span class="label label-success">Approved</span>';
		} else {
			$label = '<span class="label">Waiting for approve</span>';
		}

		return $label;
	}

	// --------------------------------------------------------------------------
}