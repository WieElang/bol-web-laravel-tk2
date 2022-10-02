<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function viewAdd($id) {
        $user = User::find($id);
        return view('add_grade', [
            "title" => "Add Grade",
            "user" => $user
        ]);
    }

    public function postAdd(Request $request) {
        $validatedData = $this->validate($request, [
            'user_id' => 'required',
            'quiz' => 'required|max:100',
            'tugas' => 'required|max:100',
            'absensi' => 'required|max:100',
            'praktek' => 'required|max:100',
            'uas' => 'required|max:100'
        ]);

        Grade::create($validatedData);
        return redirect('/' . $validatedData['user_id'])->with('success', 'New Grade has been added!');
    }
}
