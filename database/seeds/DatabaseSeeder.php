<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {

        $this->fillRooms();
        $this->fillStudents();

    }

    private function fillRooms() {
        // looping throw the buildings
        for($b = 1; $b <= 31; $b++) {
            // looping throw the floors
            for($f = 1; $f <= 5; $f++) {
                // if floor is 5
                if($f == 5) {
                    // looping thrwo the wings of floor 5 ( which is only one )
                    // coded this way to not break the layout and save the wing number
                    for($w = 1; $w <= 1; $w ++) {
                        for($r = 1; $r <= 8; $r++) {
                            $this->addRoom($b, $f, $w, $r);
                        }
                    }
                }
                // if floor is not 5
                else {
                    // looping throw the wings
                    for($w = 1; $w <= 4; $w++) {
                        // looping throw rooms of wing 1 and 2
                        if($w == 1 || $w == 2) {
                            for($r = 1; $r <= 8; $r++) {
                                $this->addRoom($b, $f, $w, $r);
                            }
                        }
                        // looping throw rooms of wing 3 and 4
                        else if ($w == 3 || $w == 4) {
                            for($r = 1; $r <= 6; $r++) {
                                $this->addRoom($b, $f, $w, $r);
                            }
                        }
                    }
                }
            }
        }
    }

    private function addRoom($building, $floor, $wing, $room) {
        DB::table('rooms')->insert([
            'room_number'=> $building,
            'building'=> $floor,
            'floor'=> $wing,
            'wing'=> $this->getRoomNumber($floor, $room),
            ]);
    }

    private function getRoomNumber($floor, $room) {
        if($room > 9) {
            return ''.$floor.''.$room;
        }
        else {
            return ''.$floor.'0'.$room;
        }
    }

    private function fillStudents() {
        DB::table('users')->insert([
            'email'=> '435108270@student.ksu.edu.sa',
            'name'=> 'Wadhah Esam',
            'password'=> Hash::make('112233'),
        ]);

        DB::table('users')->insert([
            'email'=> '435100900@student.ksu.edu.sa',
            'name'=> 'Mohammed Ganem',
            'password'=> Hash::make('112233'),
        ]);
    }

}
