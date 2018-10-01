<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function test() {
        $counter = 0;

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
                            $counter++;
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
                                $counter++;
                            }
                        }
                        // looping throw rooms of wing 3 and 4
                        else if ($w == 3 || $w == 4) {
                            for($r = 1; $r <= 6; $r++) {
                                $counter++;
                            }
                        }
                    }
                }
            }
        }
        return $counter;
    }

    public function createStudentAccount( Request $request ) {
        $newUser = new User() ;
        $newUser->name = $request->name;
        $newUser->password = Hash::make($request->password);
        $newUser->email = $request->email;
        $newUser->save();
        return $newUser;
    }
}
