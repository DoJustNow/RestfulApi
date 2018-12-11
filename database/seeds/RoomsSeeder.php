<?php

use App\Room;
use Illuminate\Database\Seeder;

class RoomsSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => 1, 'floor' => 1, 'cnt_people' => 2],
            ['id' => 2, 'floor' => 1, 'cnt_people' => 3],
            ['id' => 3, 'floor' => 1, 'cnt_people' => 1],
            ['id' => 4, 'floor' => 2, 'cnt_people' => 4],
            ['id' => 5, 'floor' => 2, 'cnt_people' => 5],
            ['id' => 6, 'floor' => 3, 'cnt_people' => 3],
            ['id' => 7, 'floor' => 3, 'cnt_people' => 3],
            ['id' => 8, 'floor' => 3, 'cnt_people' => 1],
            ['id' => 9, 'floor' => 4, 'cnt_people' => 0],
            ['id' => 10, 'floor' => 5, 'cnt_people' => 6],
        ];
        foreach ($data as $value) {
            $room = new Room($value);
            $room->save();
        }
    }
}
