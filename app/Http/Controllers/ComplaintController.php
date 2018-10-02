<?php

namespace App\Http\Controllers;

use App\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', [
                'except' => [
                    'getAllComplaints',
                    'closeComplaint',
                ]
            ]);
    }

    public function getAllComplaints() {
        return Complaint::all();
    }

    public function createComplaint(Request $request) {
        $newComplaint = new Complaint();
        $newComplaint->student_id = auth()->user()->id;
        $newComplaint->title = $request->title;
        $newComplaint->description = $request->description;
        $newComplaint->save();
        return $newComplaint;
    }

    public function closeComplaint(Request $request) {
        $complaint = Complaint::find($request->complaint_id);
        $complaint->status = 'close';
        $complaint->replay = $request->replay;
        return $complaint;
    }

    public function getComplaintsForStudent() {
        return auth()->user()->complaints;
    }

}
