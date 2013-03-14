<?php

class Location extends Eloquent 
{
	public function owner()
	{
		return $this->belongs_to('user');
	}
}