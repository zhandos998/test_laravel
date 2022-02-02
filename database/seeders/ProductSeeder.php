<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
        'ПЫЛЕСОС SAMSUNG VC18M31A0HP/EV',
        'ХОЛОДИЛЬНИК LG GA-B379SLUL',
        'СТРУЙНЫЙ МФУ EPSON L3101',
        'КОЛОНКИ SVEN 312',
        'ФИТНЕС БРАСЛЕТ XIAOMI MI SMART BAND 5',
        'НАБОР ПОСУДЫ TEFAL COMFORT MAX NEW C973SB34 (11 ПРЕДМЕТОВ)',
        'СТОЛОВЫЙ НАБОР LUMINARC ОКЕАН ЭКЛИПС 45 ПР. (L5110)',
        'СМАРТФОН ОРРО RENO5 STARRY BLACK',
        'СМАРТФОН APPLE IPHONE 12 256GB BLACK',
        'СМАРТФОН APPLE IPHONE 12 PRO MAX 512GB GRAPHITE',
        'СМАРТФОН VIVO X60 PRO BLUE',
        'НОУТБУК APPLE MACBOOK PRO 16" I9 2.3/16/1TB SSD SPACE GREY (MVVK2)',
        'НОУТБУК ASUS ROG ZEPHYRUS GX701L (90NR03Q1-M02600)',
        'КОМПЬЮТЕР ACER PREDATOR PO9-920 DG.E24MC.001',
        'НАСТОЛЬНЫЙ КОМПЬЮТЕР APPLE MAC MINI I385UX MXNG2'];

        $prices=[51990,
        199990,
        70990,
        3990,
        17990,
        45990,
        24990,
        219990,
        549890,
        859890,
        369990,
        1542990,
        1399990,
        2370990,
        617990];

        for($i=0;$i<15;$i++)
        {
            $product = new Product();
            $product->name=$names[$i];
            $product->price=$prices[$i];
            if ($i==1 || $i==7 || $i==9 || $i==10 || $i==14)
            $product->image='storage/products/product_'.($i+1).'.png';
            else
            $product->image='storage/products/product_'.($i+1).'.jpg';
            $product->save();
        }
    }
}
