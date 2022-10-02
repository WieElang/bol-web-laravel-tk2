<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Grade;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        $grades = Grade::all();
        
        $data = [
            "A" => 0,
            "B" => 0,
            "C" => 0,
            "D" => 0
        ];

        foreach ($grades as $grade) {
            $quizGrade = $this->getGrade($grade->quiz);
            $data[$quizGrade]++;

            $tugasGrade = $this->getGrade($grade->tugas);
            $data[$tugasGrade]++;

            $absensiGrade = $this->getGrade($grade->absensi);
            $data[$absensiGrade]++;

            $praktekGrade = $this->getGrade($grade->praktek);
            $data[$praktekGrade]++;

            $uasGrade = $this->getGrade($grade->uas);
            $data[$uasGrade]++;
        }

        return view('home', [
            "title" => "Home",
            "users" => $users,
            "grades" => $grades,
            "labels" => ["A", "B", "C", "D"],
            "data" => $data
        ]);
    }

    public function detail($id) {
        $user = User::find($id);
        $grade = Grade::where('user_id', $id)->first();

        if ($grade != null) {
            $data = [
                "A" => 0,
                "B" => 0,
                "C" => 0,
                "D" => 0
            ];

            $quizGrade = $this->getGrade($grade->quiz);
            $data[$quizGrade]++;

            $tugasGrade = $this->getGrade($grade->tugas);
            $data[$tugasGrade]++;

            $absensiGrade = $this->getGrade($grade->absensi);
            $data[$absensiGrade]++;

            $praktekGrade = $this->getGrade($grade->praktek);
            $data[$praktekGrade]++;

            $uasGrade = $this->getGrade($grade->uas);
            $data[$uasGrade]++;

            return view('details', [
                "title" => $user->name,
                "user" => $user,
                "grade" => $grade,
                "quiz" => $quizGrade,
                "tugas" => $tugasGrade,
                "absensi" => $absensiGrade,
                "praktek" => $praktekGrade,
                "uas" => $uasGrade,
                "labels" => ["A", "B", "C", "D"],
                "data" => $data
            ]);
        } else {
            $data = [];

            return view('details', [
                "title" => $user->name,
                "user" => $user,
                "grade" => $grade
            ]);
        }
    }

    /** This function use to get grade alphabet */
    private function getGrade($score) {
        $grade = "D";
        switch(true) {
            case $score <= 65:
                $grade = "D";
                break;
            
            case $score <= 75:
                $grade = "C";
                break;

            case $score <= 85:
                $grade = "B";
                break;

            case $score <= 100:
                $grade = "A";
                break;

            default:
                $grade = "D";
                break;
        }

        return $grade;
    }
}
