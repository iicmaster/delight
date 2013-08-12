<?php

class Material_Transaction extends Eloquent 
{

    public function material()
    { 
        return $this->belongs_to('Material');
    }

	/**
	 * Get remain stok of each material
	 * 
	 * @param	int			$material_id
	 * @return	array
	 */
	public static function get_remain_stock($material_id)
	{
        $sql = "SELECT 
                    material_id,
                    stock_code, 
                    material_order_id,
                    price_per_unit,
                    SUM(quantity) as remain
                FROM material_transactions
                WHERE
                    material_id = {$material_id}
                    AND user_id = ".Auth::user()->id."
                GROUP BY stock_code, material_id, material_order_id
                HAVING remain > 0";
        return DB::query($sql);
	}

    /**
     * Get stok history of each material
     * 
     * @param   int         $material_id
     * @return  array
     */
    public static function get_stock_history($material_id)
    {
        $sql = "SELECT 
                    material_id,
                    stock_code, 
                    material_order_id,
                    price_per_unit,
                    SUM(quantity) as remain
                FROM material_transactions
                WHERE
                    material_id = {$material_id}
                    AND user_id = ".Auth::user()->id."
                GROUP BY 
                    stock_code, 
                    material_id, 
                    material_order_id
                ORDER BY 
                    stock_code DESC, 
                    material_id, 
                    material_order_id DESC";

        return DB::query($sql);
    }

}