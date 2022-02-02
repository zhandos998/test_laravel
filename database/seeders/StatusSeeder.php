<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            'Создан',
            'Принят',
            'Ожидает оплаты',
            'Ожидает отправки',
            'Готов к доставке',
            'На доставке',
            'Доставлен'];
        foreach($statuses as $status){
            $new_status=new Status();
            $new_status->status=$status;
            $new_status->save();
        }

        //
    }
}
