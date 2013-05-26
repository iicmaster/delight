<?php

class Seed_Materials extends \S2\Seed 
{
    public function grow()
    {
        $material = new Material([
            'name' => 'แป้งเค้ก',
            'description' => 'แป้งเค้ก',
            'unit' => 'g.',
            'min_stock' => '500',
            'max_stock' => '10000',
        ]);
        $material->save();
        $material->users()->sync([1, 2]);
        $material->suppliers()->sync([1, 2, 3, 4]);

        $material = new Material([
            'name' => 'ใข่ไก่',
            'description' => 'ใข่ไก่',
            'unit' => 'ฟอง',
            'min_stock' => '5',
            'max_stock' => '32',
        ]);
        $material->save();
        $material->users()->sync([1, 2]);
        $material->suppliers()->sync([1, 2, 3, 4]);

        $material = new Material([
            'name' => 'น้ำตาลทรายป่น',
            'description' => 'น้ำตาลทรายป่น',
            'unit' => 'g.',
            'min_stock' => '500',
            'max_stock' => '5000',
        ]);
        $material->save();
        $material->users()->sync([1, 2]);
        $material->suppliers()->sync([1, 2, 3, 4]);

        $material = new Material([
            'name' => 'ผงฟู',
            'description' => 'ผงฟู',
            'unit' => 'g.',
            'min_stock' => '500',
            'max_stock' => '5000',
        ]);
        $material->save();
        $material->users()->sync([1, 2]);
        $material->suppliers()->sync([1, 2, 3, 4]);

        $material = new Material([
            'name' => 'นมข้นจืด',
            'description' => 'นมข้นจืด',
            'unit' => 'cc.',
            'min_stock' => '100',
            'max_stock' => '1000',
        ]);
        $material->save();
        $material->users()->sync([1, 2]);
        $material->suppliers()->sync([1, 2, 3, 4]);

        $material = new Material([
            'name' => 'ผงโกโก้',
            'description' => 'ผงโกโก้',
            'unit' => 'g.',
            'min_stock' => '500',
            'max_stock' => '5000',
        ]);
        $material->save();
        $material->users()->sync([1, 2]);
        $material->suppliers()->sync([1, 2, 3, 4]);

        $material = new Material([
            'name' => 'น้ำมันพืช',
            'description' => 'น้ำมันพืช',
            'unit' => 'cc.',
            'min_stock' => '100',
            'max_stock' => '1000',
        ]);
        $material->save();
        $material->users()->sync([1, 2]);
        $material->suppliers()->sync([1, 2, 3, 4]);

        $material = new Material([
            'name' => 'เกลือป่น',
            'description' => 'เกลือป่น',
            'unit' => 'g.',
            'min_stock' => '500',
            'max_stock' => '5000',
        ]);
        $material->save();
        $material->users()->sync([1, 2]);
        $material->suppliers()->sync([1, 2, 3, 4]);

        $material = new Material([
            'name' => 'วานิลลา',
            'description' => 'วานิลลา',
            'unit' => 'cc.',
            'min_stock' => '50',
            'max_stock' => '300',
        ]);
        $material->save();
        $material->users()->sync([1, 2]);
        $material->suppliers()->sync([1, 2, 3, 4]);

        $material = new Material([
            'name' => 'น้ำมะนาว',
            'description' => 'น้ำมะนาว',
            'unit' => 'cc.',
            'min_stock' => '200',
            'max_stock' => '500',
        ]);
        $material->save();
        $material->users()->sync([1, 2]);
        $material->suppliers()->sync([1, 2, 3, 4]);

        $material = new Material([
            'name' => 'ครีมออฟทาทา',
            'description' => 'ครีมออฟทาทา',
            'unit' => 'cc.',
            'min_stock' => '50',
            'max_stock' => '100',
        ]);
        $material->save();
        $material->users()->sync([1, 2]);
        $material->suppliers()->sync([1, 2, 3, 4]);

        $material = new Material([
            'name' => 'กล่องเค้ก 1 ปอนด์',
            'description' => 'กล่องเค้ก 1 ปอนด์',
            'unit' => 'กล่อง',
            'min_stock' => '5',
            'max_stock' => '50',
        ]);
        $material->save();
        $material->users()->sync([1, 2]);
        $material->suppliers()->sync([1, 2, 3, 4]);

        $material = new Material([
            'name' => 'กล่องเค้ก 2 ปอนด์',
            'description' => 'กล่องเค้ก 2 ปอนด์',
            'unit' => 'กล่อง',
            'min_stock' => '5',
            'max_stock' => '50',
        ]);
        $material->save();
        $material->users()->sync([1, 2]);
        $material->suppliers()->sync([1, 2, 3, 4]);

        $material = new Material([
            'name' => 'กระดาศรองเค้ก',
            'description' => 'กระดาศรองเค้ก',
            'unit' => 'แผ่น',
            'min_stock' => '5',
            'max_stock' => '50',
        ]);
        $material->save();
        $material->users()->sync([1, 2]);
        $material->suppliers()->sync([1, 2, 3, 4]);

        $material = new Material([
            'name' => 'ผงวุ้น',
            'description' => 'ผงวุ้น',
            'unit' => 'g.',
            'min_stock' => '50',
            'max_stock' => '500',
        ]);
        $material->save();
        $material->users()->sync([1, 2]);
        $material->suppliers()->sync([1, 2, 3, 4]);

        $material = new Material([
            'name' => 'แป้งข้าวโพด',
            'description' => 'แป้งข้าวโพด',
            'unit' => 'g.',
            'min_stock' => '500',
            'max_stock' => '5000',
        ]);
        $material->save();
        $material->users()->sync([1, 2]);
        $material->suppliers()->sync([1, 2, 3, 4]);

        $material = new Material([
            'name' => 'เหล้ารัม',
            'description' => 'เหล้ารัม',
            'unit' => 'cc.',
            'min_stock' => '100',
            'max_stock' => '1000',
        ]);
        $material->save();
        $material->users()->sync([1, 2]);
        $material->suppliers()->sync([1, 2, 3, 4]);

        $material = new Material([
            'name' => 'เนยสด',
            'description' => 'เนยสด',
            'unit' => 'g.',
            'min_stock' => '100',
            'max_stock' => '1000',
        ]);
        $material->save();
        $material->users()->sync([1, 2]);
        $material->suppliers()->sync([1, 2, 3, 4]);

        $material = new Material([
            'name' => 'น้ำส้ม',
            'description' => 'น้ำส้ม',
            'unit' => 'cc.',
            'min_stock' => '100',
            'max_stock' => '1000',
        ]);
        $material->save();
        $material->users()->sync([1, 2]);
        $material->suppliers()->sync([1, 2, 3, 4]);

        $material = new Material([
            'name' => 'แป้งกวนไส้',
            'description' => 'แป้งกวนไส้',
            'unit' => 'g.',
            'min_stock' => '500',
            'max_stock' => '5000',
        ]);
        $material->save();
        $material->users()->sync([1, 2]);
        $material->suppliers()->sync([1, 2, 3, 4]);

        $material = new Material([
            'name' => 'นมผง',
            'description' => 'นมผง',
            'unit' => 'g.',
            'min_stock' => '500',
            'max_stock' => '5000',
        ]);
        $material->save();
        $material->users()->sync([1, 2]);
        $material->suppliers()->sync([1, 2, 3, 4]);

/* ====================================================================================================== */


        /*$material = new Material;
        $material->name = 'ไข่ไก่';
        $material->description = 'ไข่ไก่';
        $material->unit = 'ฟอง';
        $material->min_stock = '5';
        $material->max_stock = '32';
        $material->save();
        $material->suppliers()->sync([1, 2, 3, 4]);*/

    }

    public function order()
    {
        return 300;
    }
}