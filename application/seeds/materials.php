<?php

class Seed_Materials extends \S2\Seed 
{
    public function grow()
    {
        $material = new Material([
            'owner_id' => 1,
            'name' => 'แป้งเค้ก',
            'description' => 'แป้งเค้ก',
            'total' => '0',
            'unit' => 'กรัม',
            'min_stock' => '500',
            'max_stock' => '10000',
        ]);
        $material->save();
        $material->suppliers()->sync([1, 2, 3, 4]);

        $material = new Material;
        $material->owner_id = 1;
        $material->name = 'ไข่ไก่';
        $material->description = 'ไข่ไก่';
        $material->total = '0';
        $material->unit = 'ฟอง';
        $material->min_stock = '5';
        $material->max_stock = '32';
        $material->save();
        $material->suppliers()->sync([1, 2, 3, 4]);

        $material = new Material;
        $material->owner_id = 1;
        $material->name = 'น้ำตาลทรายป่น';
        $material->description = 'น้ำตาลทรายป่น';
        $material->total = '0';
        $material->unit = 'กรัม';
        $material->min_stock = '500';
        $material->max_stock = '5000';
        $material->save();
        $material->suppliers()->sync([1, 2, 3, 4]);

        $material = new Material;
        $material->owner_id = 1;
        $material->name = 'ผงฟู';
        $material->description = 'ผงฟู';
        $material->total = '0';
        $material->unit = 'กรัม';
        $material->min_stock = '500';
        $material->max_stock = '5000';
        $material->save();
        $material->suppliers()->sync([1, 2, 3, 4]);

        $material = new Material;
        $material->owner_id = 1;
        $material->name = 'นมข้นจืด';
        $material->description = 'นมข้นจืด';
        $material->total = '0';
        $material->unit = 'cc.';
        $material->min_stock = '100';
        $material->max_stock = '1000';
        $material->save();
        $material->suppliers()->sync([1, 2, 3, 4]);

        $material = new Material;
        $material->owner_id = 1;
        $material->name = 'เบกกิ้งโซดา';
        $material->description = 'เบกกิ้งโซดา';
        $material->total = '0';
        $material->unit = 'cc.';
        $material->min_stock = '100';
        $material->max_stock = '1000';
        $material->save();
        $material->suppliers()->sync([1, 4]);

        $material = new Material;
        $material->owner_id = 1;
        $material->name = 'ผงโกโก้';
        $material->description = 'ผงโกโก้';
        $material->total = '0';
        $material->unit = 'กรัม';
        $material->min_stock = '500';
        $material->max_stock = '5000';
        $material->save();
        $material->suppliers()->sync([2, 4]);

        $material = new Material;
        $material->owner_id = 1;
        $material->name = 'น้ำมันพืช';
        $material->description = 'น้ำมันพืช';
        $material->total = '0';
        $material->unit = 'cc.';
        $material->min_stock = '100';
        $material->max_stock = '1000';
        $material->save();
        $material->suppliers()->sync([2, 4]);

        $material = new Material;
        $material->owner_id = 1;
        $material->name = 'เกลือป่น';
        $material->description = 'เกลือป่น';
        $material->total = '0';
        $material->unit = 'กรัม';
        $material->min_stock = '500';
        $material->max_stock = '5000';
        $material->save();
        $material->suppliers()->sync([1, 4]);

        $material = new Material;
        $material->owner_id = 1;
        $material->name = 'วานิลลา';
        $material->description = 'วานิลลา';
        $material->total = '0';
        $material->unit = 'cc.';
        $material->min_stock = '50';
        $material->max_stock = '100';
        $material->save();
        $material->suppliers()->sync([2, 3]);

        $material = new Material;
        $material->owner_id = 1;
        $material->name = 'มะนาว';
        $material->description = 'มะนาว';
        $material->total = '0';
        $material->unit = 'ลูก';
        $material->min_stock = '5';
        $material->max_stock = '30';
        $material->save();
        $material->suppliers()->sync([1, 3, 4]);

        $material = new Material;
        $material->owner_id = 1;
        $material->name = 'ครีมออฟทาทา';
        $material->description = 'ครีมออฟทาทา';
        $material->total = '0';
        $material->unit = 'cc.';
        $material->min_stock = '50';
        $material->max_stock = '100';
        $material->save();
        $material->suppliers()->sync([1, 4]);

        $material = new Material;
        $material->owner_id = 1;
        $material->name = 'กล่องเค้ก 1 ปอนด์';
        $material->description = 'กล่องเค้ก';
        $material->total = '0';
        $material->unit = 'กล่อง';
        $material->min_stock = '5';
        $material->max_stock = '50';
        $material->save();
        $material->suppliers()->sync([1, 4]);

        $material = new Material;
        $material->owner_id = 1;
        $material->name = 'กล่องเค้ก 2 ปอนด์';
        $material->description = 'กล่องเค้ก';
        $material->total = '0';
        $material->unit = 'กล่อง';
        $material->min_stock = '5';
        $material->max_stock = '50';
        $material->save();
        $material->suppliers()->sync([1, 4]);

        $material = new Material;
        $material->owner_id = 1;
        $material->name = 'กล่องเค้ก 3 ปอนด์';
        $material->description = 'กล่องเค้ก';
        $material->total = '0';
        $material->unit = 'กล่อง';
        $material->min_stock = '5';
        $material->max_stock = '50';
        $material->save();
        $material->suppliers()->sync([1, 4]);


        $material = new Material;
        $material->owner_id = 1;
        $material->name = 'กระดาษรองเค้ก';
        $material->description = 'กระดาษรองเค้ก';
        $material->total = '0';
        $material->unit = 'แผ่น';
        $material->min_stock = '5';
        $material->max_stock = '50';
        $material->save();
        $material->suppliers()->sync([1, 4]);

        $material = new Material;
        $material->owner_id = 1;
        $material->name = 'ผงวุ้น';
        $material->description = 'ผงวุ้น';
        $material->total = '0';
        $material->unit = 'กรัม';
        $material->min_stock = '50';
        $material->max_stock = '100';
        $material->save();
        $material->suppliers()->sync([2, 3]);

        $material = new Material;
        $material->owner_id = 1;
        $material->name = 'แป้งข้าวโพด';
        $material->description = 'แป้งข้าวโพด';
        $material->total = '0';
        $material->unit = 'กรัม';
        $material->min_stock = '500';
        $material->max_stock = '5000';
        $material->save();
        $material->suppliers()->sync([1, 2, 3, 4]);

        $material = new Material;
        $material->owner_id = 1;
        $material->name = 'เนยสด';
        $material->description = 'เนยสด';
        $material->total = '0';
        $material->unit = 'กรัม';
        $material->min_stock = '500';
        $material->max_stock = '5000';
        $material->save();
        $material->suppliers()->sync([1, 2, 3, 4]);

        $material = new Material;
        $material->owner_id = 1;
        $material->name = 'เหล้ารัม';
        $material->description = 'เหล้ารัม';
        $material->total = '0';
        $material->unit = 'cc.';
        $material->min_stock = '50';
        $material->max_stock = '1000';
        $material->save();
        $material->suppliers()->sync([2, 3]);

        //-------------------------------------------------------------------------------------------

        $material = new Material;
        $material->owner_id = 2;
        $material->name = 'แป้งเค้ก';
        $material->description = 'แป้งเค้ก';
        $material->total = '0';
        $material->unit = 'กรัม';
        $material->min_stock = '500';
        $material->max_stock = '10000';
        $material->save();
        $material->suppliers()->sync([1, 2, 3, 4]);

        $material = new Material;
        $material->owner_id = 2;
        $material->name = 'ไข่ไก่';
        $material->description = 'ไข่ไก่';
        $material->total = '0';
        $material->unit = 'ฟอง';
        $material->min_stock = '5';
        $material->max_stock = '32';
        $material->save();
        $material->suppliers()->sync([1, 2, 3, 4]);

        $material = new Material;
        $material->owner_id = 2;
        $material->name = 'น้ำตาลทรายป่น';
        $material->description = 'น้ำตาลทรายป่น';
        $material->total = '0';
        $material->unit = 'กรัม';
        $material->min_stock = '500';
        $material->max_stock = '5000';
        $material->save();
        $material->suppliers()->sync([1, 2, 3, 4]);

        $material = new Material;
        $material->owner_id = 2;
        $material->name = 'ผงฟู';
        $material->description = 'ผงฟู';
        $material->total = '0';
        $material->unit = 'กรัม';
        $material->min_stock = '500';
        $material->max_stock = '5000';
        $material->save();
        $material->suppliers()->sync([1, 2, 3, 4]);

        $material = new Material;
        $material->owner_id = 2;
        $material->name = 'นมข้นจืด';
        $material->description = 'นมข้นจืด';
        $material->total = '0';
        $material->unit = 'cc.';
        $material->min_stock = '100';
        $material->max_stock = '1000';
        $material->save();
        $material->suppliers()->sync([1, 2, 3, 4]);

        $material = new Material;
        $material->owner_id = 2;
        $material->name = 'เบกกิ้งโซดา';
        $material->description = 'เบกกิ้งโซดา';
        $material->total = '0';
        $material->unit = 'cc.';
        $material->min_stock = '100';
        $material->max_stock = '1000';
        $material->save();
        $material->suppliers()->sync([1, 4]);

        $material = new Material;
        $material->owner_id = 2;
        $material->name = 'ผงโกโก้';
        $material->description = 'ผงโกโก้';
        $material->total = '0';
        $material->unit = 'กรัม';
        $material->min_stock = '500';
        $material->max_stock = '5000';
        $material->save();
        $material->suppliers()->sync([2, 4]);

        $material = new Material;
        $material->owner_id = 2;
        $material->name = 'น้ำมันพืช';
        $material->description = 'น้ำมันพืช';
        $material->total = '0';
        $material->unit = 'cc.';
        $material->min_stock = '100';
        $material->max_stock = '1000';
        $material->save();
        $material->suppliers()->sync([2, 4]);

        $material = new Material;
        $material->owner_id = 2;
        $material->name = 'เกลือป่น';
        $material->description = 'เกลือป่น';
        $material->total = '0';
        $material->unit = 'กรัม';
        $material->min_stock = '500';
        $material->max_stock = '5000';
        $material->save();
        $material->suppliers()->sync([1, 4]);

        $material = new Material;
        $material->owner_id = 2;
        $material->name = 'วานิลลา';
        $material->description = 'วานิลลา';
        $material->total = '0';
        $material->unit = 'cc.';
        $material->min_stock = '50';
        $material->max_stock = '100';
        $material->save();
        $material->suppliers()->sync([2, 3]);

        $material = new Material;
        $material->owner_id = 2;
        $material->name = 'มะนาว';
        $material->description = 'มะนาว';
        $material->total = '0';
        $material->unit = 'ลูก';
        $material->min_stock = '5';
        $material->max_stock = '30';
        $material->save();
        $material->suppliers()->sync([1, 3, 4]);

        $material = new Material;
        $material->owner_id = 2;
        $material->name = 'ครีมออฟทาทา';
        $material->description = 'ครีมออฟทาทา';
        $material->total = '0';
        $material->unit = 'cc.';
        $material->min_stock = '50';
        $material->max_stock = '100';
        $material->save();
        $material->suppliers()->sync([1, 4]);

        $material = new Material;
        $material->owner_id = 2;
        $material->name = 'กล่องเค้ก 1 ปอนด์';
        $material->description = 'กล่องเค้ก';
        $material->total = '0';
        $material->unit = 'กล่อง';
        $material->min_stock = '5';
        $material->max_stock = '50';
        $material->save();
        $material->suppliers()->sync([1, 4]);

        $material = new Material;
        $material->owner_id = 2;
        $material->name = 'กล่องเค้ก 2 ปอนด์';
        $material->description = 'กล่องเค้ก';
        $material->total = '0';
        $material->unit = 'กล่อง';
        $material->min_stock = '5';
        $material->max_stock = '50';
        $material->save();
        $material->suppliers()->sync([1, 4]);

        $material = new Material;
        $material->owner_id = 2;
        $material->name = 'กล่องเค้ก 3 ปอนด์';
        $material->description = 'กล่องเค้ก';
        $material->total = '0';
        $material->unit = 'กล่อง';
        $material->min_stock = '5';
        $material->max_stock = '50';
        $material->save();
        $material->suppliers()->sync([1, 4]);


        $material = new Material;
        $material->owner_id = 2;
        $material->name = 'กระดาษรองเค้ก';
        $material->description = 'กระดาษรองเค้ก';
        $material->total = '0';
        $material->unit = 'แผ่น';
        $material->min_stock = '5';
        $material->max_stock = '50';
        $material->save();
        $material->suppliers()->sync([1, 4]);

        $material = new Material;
        $material->owner_id = 2;
        $material->name = 'ผงวุ้น';
        $material->description = 'ผงวุ้น';
        $material->total = '0';
        $material->unit = 'กรัม';
        $material->min_stock = '50';
        $material->max_stock = '100';
        $material->save();
        $material->suppliers()->sync([2, 3]);

        $material = new Material;
        $material->owner_id = 2;
        $material->name = 'แป้งข้าวโพด';
        $material->description = 'แป้งข้าวโพด';
        $material->total = '0';
        $material->unit = 'กรัม';
        $material->min_stock = '500';
        $material->max_stock = '5000';
        $material->save();
        $material->suppliers()->sync([1, 2, 3, 4]);

        $material = new Material;
        $material->owner_id = 2;
        $material->name = 'เนยสด';
        $material->description = 'เนยสด';
        $material->total = '0';
        $material->unit = 'กรัม';
        $material->min_stock = '500';
        $material->max_stock = '5000';
        $material->save();
        $material->suppliers()->sync([1, 2, 3, 4]);

        $material = new Material;
        $material->owner_id = 2;
        $material->name = 'เหล้ารัม';
        $material->description = 'เหล้ารัม';
        $material->total = '0';
        $material->unit = 'cc.';
        $material->min_stock = '50';
        $material->max_stock = '1000';
        $material->save();
        $material->suppliers()->sync([2, 3]);
    }

    public function order()
    {
        return 300;
    }
}