<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order = new Order();
        $order->first_name = "Zhandos";
        $order->last_name = "Zhappas";
        $order->phone_number = "+77473186847";
        $order->price = json_encode(array(51990,199990,70990,3990,17990,51990,199990,70990));
        $order->product_name = json_encode(array('ПЫЛЕСОС SAMSUNG VC18M31A0HP/EV','ХОЛОДИЛЬНИК LG GA-B379SLUL','СТРУЙНЫЙ МФУ EPSON L3101','КОЛОНКИ SVEN 312','ФИТНЕС БРАСЛЕТ XIAOMI MI SMART BAND 5','ПЫЛЕСОС SAMSUNG VC18M31A0HP/EV','ХОЛОДИЛЬНИК LG GA-B379SLUL','СТРУЙНЫЙ МФУ EPSON L3101'));
        $order->id_status = 1;
        $order->save();
        //
    }
}
