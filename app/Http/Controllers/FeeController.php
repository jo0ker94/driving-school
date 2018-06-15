<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Student;
use App\Course;
use App\Feepayment;

class FeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function fee(){
        $students = DB::select('SELECT * FROM students ORDER BY students.id ASC');
        return view('fee.fee', ['students' =>$students]);
    }

    public function view($student_id)
    {
        $student= Student::find($student_id);
        $feepayments = Feepayment::where('student_id','=',$student_id)->get();
        $total = 0;

        foreach($feepayments as $payment) {
            $total += $payment->deposit_paid;
        }
        
        return view('fee.fetch', ['student' => $student,'feepayments' =>$feepayments, 'total' => $total]);
    }

    public function addFee(Request $request){
        $this->validate($request, [
            'student_id' => 'required',
            'date_received' => 'required',
            'deposit_paid' => 'required',
        ]);

        $feespayments = new Feepayment;
        $feespayments->student_id =$request->input('student_id' );
        $feespayments->date_received =$request->input('date_received');
        $feespayments->deposit_paid =$request->input('deposit_paid');
        $feespayments->save();
        return back()->with('response', 'Payment Made Successfully');
    }
  
}

