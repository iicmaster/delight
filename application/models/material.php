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

    public function get_stock_remain()
    {
        $user_materials = $this->users()
                               ->pivot()
                               ->where_user_id(Auth::user()->id)
                               ->first();
                               
        return $user_materials->total;
    }

    /**
     * Scope for recommended to restock
     * 
     * @param   array       $material_ids
     * @return  object
     */
    public static function get_recommended_to_restock($material_ids = null)
    {
        $query = Material::select([
                             'materials.*',
                             'user_materials.total'
                         ])
                         ->join('user_materials', 'materials.id', '=', 'user_materials.material_id')
                         ->where('user_id', '=', Auth::user()->id)
                         ->where('total', '<', DB::raw('`max_stock`'));

        if (! is_null($material_ids) and is_array($material_ids)) {
            $query = $query->where_in('materials.id', $material_ids);
        }

        return $query->get();        
    }
}