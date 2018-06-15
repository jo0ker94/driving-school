<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\DrivingLesson;
use App\Student;
use Illuminate\Http\Request;

class DrivingLessonController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view() {
        $students = Student::all();
        $lessons = DB::select('SELECT * FROM students, driving_lessons WHERE  
        driving_lessons.student_id = students.id ORDER BY students.id ASC ');
        return view('master.lessons', ['lessons' =>$lessons, 'students'=> $students]);
    }

    public function addLesson(Request $request) {
        $this->validate($request, [
            'student_id' => 'required',
            'start_time' => 'required',
            'lessons_no' => 'required',
          ]);
    
          $lesson = new DrivingLesson;
          $lesson->instructor = Auth::user()->name;
          $lesson->student_id = $request->input('student_id');
          $lesson->start_date = $request->input('start_date');
          $lesson->start_time = $request->input('start_time');
          $lesson->lessons_no = $request->input('lessons_no');
          $lesson->save();
          return redirect('/lessons')->with('response', 'Driving lesson added!');
    }

    public function studentLessons($studentId) {
        $lessons = DrivingLesson::where('student_id','=',$student_id)
        ->join('students','student_id','=','id')->get();
        return view('student_lessons')->with('lessons', $lessons);
    }
}
