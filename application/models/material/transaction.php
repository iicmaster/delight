<?php

class Material_Transaction extends Eloquent 
{
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
                    SUM(quantity) as remain
                FROM material_transactions
                WHERE
                    material_id = {$material_id}
                GROUP BY stock_code, material_id
                HAVING remain > 0";
        return DB::query($sql);
	}

}