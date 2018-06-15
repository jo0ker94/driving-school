<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Student;
use App\Course;
use Carbon\Carbon;
use App\Examination;
use App\Feepayment;
use App\DrivingLesson;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function student(){
        $student = DB::select('SELECT * FROM students, courses WHERE 
                       (students.course_ID=courses.ID )
                       ORDER BY students.id ASC');
        $course = Course::all();
        return view('master.student', ['student' =>$student, 'course' =>$course]);
    }
    
    public function addStudent(Request $request){
      $this->validate($request, [
        'studentname' => 'required',
        'phone_no' => 'required',
        'email' => 'required',
        'course_ID' => 'required',
        'location' => 'required',
        'start_date' => 'required',
      ]);

      $student = new Student;
      $dt = Carbon::now();
      $nextId = DB::table('students')->max('id') + 01;
      $admission_no='ASTN'. '/'.$dt->year.'/'.$nextId;
      $student->studentname =$request->input('studentname');
      $student->email =$request->input('email');
      $student->admission_no =$admission_no;
      $student->phone_no =$request->input('phone_no');
      $student->course_ID =$request->input('course_ID');
      $student->location =$request->input('location');
      $student->start_date =$request->input('start_date');
      $student->password = StudentController::randomPassword();
      $student->passed = false;
      $student->save();
      StudentController::send_email($student, Auth::user()->name);
      return redirect('/student')->with('response', 'Student Registered Successfully');
    }

    public function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    public function send_email($student, $instructor) {
        $data = array('student'=> $student, 'instructor'=> $instructor);
        Mail::send('mail', $data, function($message) use ($student) {
           $message->to($student->email, $student->studentname)->subject
              ('Tintilinić Autoschool account');
           $message->from('autoschoolwebapp@gmail.com','Autoschool Tintilinić');
        });
     }

    public function passStudentView($student_id) { 
        $student = Student::find($student_id);
        return view('master.pass_student', ['student' =>$student]);
    }

    public function passStudent($student_id) {
        $student = Student::find($student_id);
        $student->passed = true;
        $student->save();
        return redirect('student')->with('response', "{$student->studentname} passed!");
    }

}
