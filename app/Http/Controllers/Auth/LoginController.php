<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Student;
use App\Examination;
use App\Feepayment;
use App\DrivingLesson;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/student';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function studentAccessView() {
        return view('master.student_access_view');
    }

    public function studentAccessData(Request $request) {
        $students = Student::where(function($q) use ($request) {
            $q->where('email', '=', $request->input('email'));
            $q->where('password', '=', $request->input('password'));
        })->get();

        if (count($students) > 0) {
            $student = $students->first();
            $exams = Examination::where('student_id', '=', $student->id)->get();
            $payments = Feepayment::where('student_id', '=', $student->id)->get();
            $lessons = DrivingLesson::where('student_id', '=', $student->id)->get();
            return view('master.student_access', ['student' => $student, 'payments' => $payments,
            'exams' => $exams, 'lessons' => $lessons]);
        } else {
            return redirect('student_access')->with('response', "No student with entered credentials found.");
        }
      
    }
}
