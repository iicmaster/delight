<?php

class Seed_Materials extends \S2\Seed 
{
    public function grow()
    {
        $material = new Material;
        $material->name = 'แป้งเค้ก';
        $material->description = 'แป้งเค้ก';
        $material->total = '2000';
        $material->unit = 'กรัม';
        $material->min_stock = '500';
        $material->max_stock = '10000';
        $material->save();

        $material = new Material;
        $material->name = 'ไข่ไก่';
        $material->description = 'ไข่ไก่';
        $material->total = '10';
        $material->unit = 'ฟอง';
        $material->min_stock = '32';
        $material->max_stock = '5';
        $material->save();

        $material = new Material;
        $material->name = 'น้ำตาลทรายป่น';
        $material->description = 'น้ำตาลทรายป่น';
        $material->total = '1358';
        $material->unit = 'กรัม';
        $material->min_stock = '500';
        $material->max_stock = '5000';
        $material->save();

        $material = new Material;
        $material->name = 'ผงฟู';
        $material->description = 'ผงฟู';
        $material->total = '1658';
        $material->unit = 'กรัม';
        $material->min_stock = '500';
        $material->max_stock = '5000';
        $material->save();

        $material = new Material;
        $material->name = 'นมข้นจืด';
        $material->description = 'นมข้นจืด';
        $material->total = '551';
        $material->unit = 'cc.';
        $material->min_stock = '100';
        $material->max_stock = '1000';
        $material->save();

        $material = new Material;
        $material->name = 'เบกกิ้งโซดา';
        $material->description = 'เบกกิ้งโซดา';
        $material->total = '2000';
        $material->unit = 'cc.';
        $material->min_stock = '100';
        $material->max_stock = '1000';
        $material->save();

        $material = new Material;
        $material->name = 'ผงโกโก้';
        $material->description = 'ผงโกโก้';
        $material->total = '1256';
        $material->unit = 'กรัม';
        $material->min_stock = '500';
        $material->max_stock = '5000';
        $material->save();

        $material = new Material;
        $material->name = 'น้ำมันพืช';
        $material->description = 'น้ำมันพืช';
        $material->total = '1465';
        $material->unit = 'cc.';
        $material->min_stock = '100';
        $material->max_stock = '1000';
        $material->save();

        $material = new Material;
        $material->name = 'เกลือป่น';
        $material->description = 'เกลือป่น';
        $material->total = '1548';
        $material->unit = 'กรัม';
        $material->min_stock = '500';
        $material->max_stock = '5000';
        $material->save();

        $material = new Material;
        $material->name = 'วานิลลา';
        $material->description = 'วานิลลา';
        $material->total = '506';
        $material->unit = 'cc.';
        $material->min_stock = '50';
        $material->max_stock = '100';
        $material->save();

        $material = new Material;
        $material->name = 'มะนาว';
        $material->description = 'มะนาว';
        $material->total = '13';
        $material->unit = 'ลูก';
        $material->min_stock = '5';
        $material->max_stock = '30';
        $material->save();

        $material = new Material;
        $material->name = 'ครีมออฟทาทา';
        $material->description = 'ครีมออฟทาทา';
        $material->total = '80';
        $material->unit = 'cc.';
        $material->min_stock = '50';
        $material->max_stock = '100';
        $material->save();

        $material = new Material;
        $material->name = 'กล่องเค้ก';
        $material->description = 'กล่องเค้ก';
        $material->total = '30';
        $material->unit = 'กล่อง';
        $material->min_stock = '5';
        $material->max_stock = '50';
        $material->save();

        $material = new Material;
        $material->name = 'กระดาษรองเค้ก';
        $material->description = 'กระดาษรองเค้ก';
        $material->total = '20';
        $material->unit = 'แผ่น';
        $material->min_stock = '5';
        $material->max_stock = '50';
        $material->save();

        $material = new Material;
        $material->name = 'ผงวุ้น';
        $material->description = 'ผงวุ้น';
        $material->total = '506';
        $material->unit = 'กรัม';
        $material->min_stock = '50';
        $material->max_stock = '100';
        $material->save();

        $material = new Material;
        $material->name = 'แป้งข้าวโพด';
        $material->description = 'แป้งข้าวโพด';
        $material->total = '506';
        $material->unit = 'กรัม';
        $material->min_stock = '500';
        $material->max_stock = '5000';
        $material->save();

        $material = new Material;
        $material->name = 'เนยสด';
        $material->description = 'เนยสด';
        $material->total = '509';
        $material->unit = 'กรัม';
        $material->min_stock = '500';
        $material->max_stock = '5000';
        $material->save();

        $material = new Material;
        $material->name = 'เหล้ารัม';
        $material->description = 'เหล้ารัม';
        $material->total = '985';
        $material->unit = 'cc.';
        $material->min_stock = '50';
        $material->max_stock = '1000';
        $material->save();
    }

    public function order()
    {
        return 300;
    }
}