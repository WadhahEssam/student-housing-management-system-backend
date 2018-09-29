<?php

namespace App\Http\Controllers;

use App\Room;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function getAllRooms() {
        return Room::get()->all();
    }

    public function getStudentRoom() {
        return auth()->user()->room;
    }

    public function setStudentRoom(Request $request) {
        $room_id = $request->room_id;
        $student_id = auth()->user()->id;
        // check weather the room is registered to anther student
        if(isset(Room::find($room_id)->student_id)) {
            return 'room is already registered to anther student';
        }
        if(isset(User::find($student_id)->room)) {
            return 'student already has a room';
        }
        $updatedRoom = Room::find($room_id);
        $updatedRoom->update(['student_id'=> $student_id]);
        return $updatedRoom;
    }

}
