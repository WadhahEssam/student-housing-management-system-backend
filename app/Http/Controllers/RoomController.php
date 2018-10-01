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
        $this->middleware('auth:api', ['except' => ['getAllRooms', 'getRoomID', 'getRoomInfo']]);
    }

    public function getAllRooms() {
        return Room::get(['id', 'building', 'floor', 'wing', 'room_number'])->all();
    }

    public function getStudentRoom() {
        return auth()->user()->room;
    }

    public function setStudentRoom(Request $request) {
        $room_id = $request->room_id;
        $student_id = auth()->user()->id;
        if(isset(Room::find($room_id)->student_id)) {
            return 'room is already registered to another student';
        }
        if(isset(User::find($student_id)->room)) {
            return 'student already has a room';
        }
        $updatedRoom = Room::find($room_id);
        $updatedRoom->update(['student_id'=> $student_id]);
        return $updatedRoom;
    }

    public function changeStudentRoom(Request $request) {
        $room_id = $request->room_id;
        $student_id = auth()->user()->id;
        if(isset(Room::find($room_id)->student_id)) {
            return 'room is already registered to another student';
        }
        if(!isset(User::find($student_id)->room)) {
            return 'student does not have a room';
        }
        $updatedRoom = Room::find($room_id);
        $oldRoom = Room::find(auth()->user()->room->id);
        $updatedRoom->update(['student_id'=> $student_id]);
        $oldRoom->update(['student_id'=> null]);
        return $updatedRoom;
    }

    public function clearStudentRoom(Request $request) {
        if(!isset(auth()->user()->room)) {
            return 'student does not have a room yet';
        }
        $room_id =auth()->user()->room->id;
        $clearedRoom = Room::find($room_id);
        $clearedRoom->update(['student_id'=> null]);
        return $clearedRoom;
    }

    public function getRoomInfo(Request $request) {
        return Room::find($request->room_id);
    }

    public function getRoomID(Request $request) {
        return Room::where([
                ['building','=',$request->building],
                ['room_number','=',$request->room_number],
            ])
            ->get()->first()->id;
    }

}
