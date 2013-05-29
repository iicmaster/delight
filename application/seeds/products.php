<?php

class Seed_Products extends \S2\Seed 
{
    public function grow()
    {
        $product = new Product;
        $product->name = 'Soft Chocolate Cake';
        $product->description = 'เค้กช็อกโกแล๊ตหน้านิ่ม';
        $product->image = '/img/1.jpg';
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

        $product = new Product;
        $product->name = 'Soft Chocolate Cake';
        $product->description = 'เค้กช็อกโกแล๊ตหน้านิ่ม';
        $product->image = '/img/2.jpg';
        $product->unit = 'ปอนด์';
        $product->size = '2';
        $product->total = '0';
        $product->price = '350';
        $product->save();

        $product->materials()->attach('1', array('quantity' => '180'));
        $product->materials()->attach('2', array('quantity' => '5'));
        $product->materials()->attach('3', array('quantity' => '650'));
        $product->materials()->attach('4', array('quantity' => '5'));
        $product->materials()->attach('5', array('quantity' => '324'));
        $product->materials()->attach('6', array('quantity' => '126'));
        $product->materials()->attach('7', array('quantity' => '135'));
        $product->materials()->attach('8', array('quantity' => '3'));
        $product->materials()->attach('9', array('quantity' => '3'));
        $product->materials()->attach('10', array('quantity' => '3'));
        $product->materials()->attach('11', array('quantity' => '3'));
        $product->materials()->attach('13', array('quantity' => '1'));
        $product->materials()->attach('14', array('quantity' => '1'));
        $product->materials()->attach('15', array('quantity' => '5'));
        $product->materials()->attach('16', array('quantity' => '60'));
        $product->materials()->attach('17', array('quantity' => '250'));
        $product->materials()->attach('18', array('quantity' => '8'));

        $product = new Product;
        $product->name = 'Soft Orange Cake';
        $product->description = 'เค้กส้มหน้านิ่ม';
        $product->image = '/img/3.jpg';
        $product->unit = 'ปอนด์';
        $product->size = '1';
        $product->total = '0';
        $product->price = '250';
        $product->save();

        $product->materials()->attach('1', array('quantity' => '80'));
        $product->materials()->attach('4', array('quantity' => '3'));
        $product->materials()->attach('3', array('quantity' => '140'));
        $product->materials()->attach('8', array('quantity' => '1'));
        $product->materials()->attach('5', array('quantity' => '20'));
        $product->materials()->attach('2', array('quantity' => '2'));
        $product->materials()->attach('18', array('quantity' => '80'));
        $product->materials()->attach('22', array('quantity' => '10'));
        $product->materials()->attach('23', array('quantity' => '3'));
        $product->materials()->attach('13', array('quantity' => '1'));
        $product->materials()->attach('14', array('quantity' => '1'));
        $product->materials()->attach('24', array('quantity' => '75'));
        $product->materials()->attach('20', array('quantity' => '25'));

        $product = new Product;
        $product->name = 'Soft Orange Cake';
        $product->description = 'เค้กส้มหน้านิ่ม';
        $product->image = '/img/4.jpg';
        $product->unit = 'ปอนด์';
        $product->size = '2';
        $product->total = '0';
        $product->price = '350';
        $product->save();

        $product->materials()->attach('1', array('quantity' => '120'));
        $product->materials()->attach('4', array('quantity' => '5'));
        $product->materials()->attach('3', array('quantity' => '210'));
        $product->materials()->attach('8', array('quantity' => '2'));
        $product->materials()->attach('5', array('quantity' => '25'));
        $product->materials()->attach('2', array('quantity' => '3'));
        $product->materials()->attach('18', array('quantity' => '120'));
        $product->materials()->attach('22', array('quantity' => '13'));
        $product->materials()->attach('23', array('quantity' => '5'));
        $product->materials()->attach('13', array('quantity' => '1'));
        $product->materials()->attach('14', array('quantity' => '1'));
        $product->materials()->attach('24', array('quantity' => '120'));
        $product->materials()->attach('20', array('quantity' => '33'));
        
        $product = new Product;
        $product->name = 'Strawberry Cream Cake';
        $product->description = 'เค้กครีมสตอเบอร์รี่';
        $product->image = '/img/5.jpg';
        $product->unit = 'ปอนด์';
        $product->size = '1';
        $product->total = '0';
        $product->price = '250';
        $product->save();

        $product->materials()->attach('1', array('quantity' => '130'));
        $product->materials()->attach('4', array('quantity' => '5'));
        $product->materials()->attach('21', array('quantity' => '15'));
        $product->materials()->attach('2', array('quantity' => '4'));
        $product->materials()->attach('3', array('quantity' => '170'));
        $product->materials()->attach('8', array('quantity' => '4'));
        $product->materials()->attach('22', array('quantity' => '10'));
        $product->materials()->attach('27', array('quantity' => '175'));
        $product->materials()->attach('9', array('quantity' => '2'));
        $product->materials()->attach('18', array('quantity' => '100'));
        $product->materials()->attach('2', array('quantity' => '4'));
        $product->materials()->attach('20', array('quantity' => '10'));
        $product->materials()->attach('28', array('quantity' => '100'));
        $product->materials()->attach('25', array('quantity' => '300'));
        $product->materials()->attach('28', array('quantity' => '100'));
        $product->materials()->attach('26', array('quantity' => '30'));
        
        $product = new Product;
        $product->name = 'Strawberry Cream Cake';
        $product->description = 'เค้กครีมสตอเบอร์รี่';
        $product->image = '/img/6.jpg';
        $product->unit = 'ปอนด์';
        $product->size = '2';
        $product->total = '0';
        $product->price = '350';
        $product->save();

        $product->materials()->attach('1', array('quantity' => '180'));
        $product->materials()->attach('4', array('quantity' => '8'));
        $product->materials()->attach('21', array('quantity' => '23'));
        $product->materials()->attach('2', array('quantity' => '6'));
        $product->materials()->attach('3', array('quantity' => '280'));
        $product->materials()->attach('8', array('quantity' => '6'));
        $product->materials()->attach('22', array('quantity' => '15'));
        $product->materials()->attach('27', array('quantity' => '280'));
        $product->materials()->attach('9', array('quantity' => '3'));
        $product->materials()->attach('18', array('quantity' => '150'));
        $product->materials()->attach('2', array('quantity' => '6'));
        $product->materials()->attach('20', array('quantity' => '15'));
        $product->materials()->attach('28', array('quantity' => '150'));
        $product->materials()->attach('25', array('quantity' => '430'));
        $product->materials()->attach('28', array('quantity' => '120'));
        $product->materials()->attach('26', array('quantity' => '40'));
        
        }

    public function order()
    {
        return 500;
    }
}