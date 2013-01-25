<?php

class Seed_Suppliers extends \S2\Seed 
{
    public function grow()
    {
        $supplier = new Supplier;
        $supplier->name = 'Sweet House';
        $supplier->address = 'ลาดพร้าว';
        $supplier->tel = '028569465';
        $supplier->contact = 'คุณโจ';
        $supplier->contact_tel = '0845693215';
        $supplier->save();

        $supplier = new Supplier;
        $supplier->name = 'De Ra Pang';
        $supplier->address = 'ลาดพร้าว';
        $supplier->tel = '024587693';
        $supplier->contact = 'คุณเจน';
        $supplier->contact_tel = '0865493254';
        $supplier->save();

        $supplier = new Supplier;
        $supplier->name = 'Cake House';
        $supplier->address = 'วงเวียนใหญ่';
        $supplier->tel = '0213568455';
        $supplier->contact = 'คุณนัท';
        $supplier->contact_tel = '0865336689';
        $supplier->save();

        $supplier = new Supplier;
        $supplier->name = 'J&S Shop';
        $supplier->address = 'วงเวียนใหญ่';
        $supplier->tel = '025568499';
        $supplier->contact = 'คุณอ้อม';
        $supplier->contact_tel = '0869959688';
        $supplier->save();
    }

    public function order()
    {
        return 200;
    }
}