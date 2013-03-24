<?php

class Seed_Products extends \S2\Seed 
{
    public function grow()
    {
        $product = new Product;
        $product->name = 'Soft Chocolate Cake';
        $product->description = 'เค้กช็อกโกแล๊ตหน้านิ่ม';
        $product->image = '/uploads/products/1.jpg';
        $product->unit = 'ปอนด์';
        $product->size = '1';
        $product->total = '0';
        $product->price = '250';
        $product->save();

        $product->materials()->attach('1', array('quantity' => '120'));
        $product->materials()->attach('2', array('quantity' => '3'));
        $product->materials()->attach('3', array('quantity' => '390'));
        $product->materials()->attach('4', array('quantity' => '3'));
        $product->materials()->attach('5', array('quantity' => '188'));
        $product->materials()->attach('6', array('quantity' => '88'));
        $product->materials()->attach('7', array('quantity' => '93'));
        $product->materials()->attach('8', array('quantity' => '2'));
        $product->materials()->attach('9', array('quantity' => '2'));
        $product->materials()->attach('10', array('quantity' => '2'));
        $product->materials()->attach('11', array('quantity' => '2'));
        $product->materials()->attach('12', array('quantity' => '1'));
        $product->materials()->attach('15', array('quantity' => '1'));
        $product->materials()->attach('16', array('quantity' => '5'));
        $product->materials()->attach('17', array('quantity' => '40'));
        $product->materials()->attach('18', array('quantity' => '150'));
        $product->materials()->attach('19', array('quantity' => '5'));
    }

    public function order()
    {
        return 500;
    }
}