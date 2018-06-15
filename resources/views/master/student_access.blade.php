@extends('admin_template')

@section('content')
<div class="row">
   <div class="col-xs-12">
    <div class="box">
      @if(count($errors) > 0)
               @foreach($errors->all() as $error)
                   <div class="alert alert-danger">{{$error}}</div>
               @endforeach
           @endif

           @if(session('response'))
               <div class="alert alert-success">{{session('response')}}</div>
           @endif
      <div class="box-header">
        <h3 class="box-title">
          </h3>
      </div>

       <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{$student->studentname}}'s data</h3>
               </div>
                <div class="box-body">
                 <table id="example1" class="table table-bordered table-striped" width="100%">
                  <thead>
                  <tr>
                    <td bgcolor="#999999">STUDENT NAME</td>
                    <td bgcolor="#999999">PHONE NUMBER</td>
                    <td bgcolor="#999999">COURSE NAME</td>
                    <td bgcolor="#999999">ADMISSION ID</td>
                    <td bgcolor="#999999">ADMISSION DATE</td>
                    <td bgcolor="#999999">PASSED</td>
                  </tr>
                </thead>
                <tbody>
                   <tr>
                       <td>{{$student->studentname}}</td>
                       <td>{{$student->phone_no}}</td>
                       <td>{{$student->coursename }}</td>
                       <td>{{$student->admission_no}}</td>
                       <td>{{$student->start_date}}</td>
                       @if($student->passed == 0) 
                       <td>No</td>
                       @else
                        <td>Yes</td>
                       @endif
                   </tr>
             </tbody>

          </table>

          <h3>Driving lessons</h3>
          <table id="example1" class="table table-bordered table-striped" width="100%">
                <thead>
                <tr>
                  <td bgcolor="#999999">ID</td>
                  <td bgcolor="#999999">INSTRUCTOR</td>
                  <td bgcolor="#999999">DATE</td>
                  <td bgcolor="#999999">TIME</td>
                  <td bgcolor="#999999">LESSON HOURS</td>
                </tr>
              </thead>
              <tbody>
            @if(count($lessons) > 0)
               @foreach($lessons as $lesson)   
                 <tr>
                     <td>{{$lesson->id}}</td>
                     <td>{{$lesson->instructor}}</td>
                     <td>{{$lesson->start_date}}</td>
                     <td>{{$lesson->start_time }}</td>
                     <td>{{$lesson->lessons_no}}</td>
                 </tr>
             @endforeach
         @endif
        </tbody>
        </table>

        <h3>Exams</h3>
          <table id="example1" class="table table-bordered table-striped" width="100%">
                <thead>
                <tr>
                  <td bgcolor="#999999">ID</td>
                  <td bgcolor="#999999">WRITTEN EXAM</td>
                  <td bgcolor="#999999">DRIVING EXAM</td>
                </tr>
              </thead>
              <tbody>
            @if(count($exams) > 0)
               @foreach($exams as $exam)   
                 <tr>
                     <td>{{$exam->examID}}</td>
                     <td>{{$exam->examdate1}} {{$exam->examtime1}}</td>
                     <td>{{$exam->examdate2}} {{$exam->examtime2}}</td>
                 </tr>
             @endforeach
         @endif
        </tbody>
        </table>

        <h3>Payments</h3>
          <table id="example1" class="table table-bordered table-striped" width="100%">
                <thead>
                <tr>
                  <td bgcolor="#999999">ID</td>
                  <td bgcolor="#999999">Date Paid</td>
                  <td bgcolor="#999999">Amount Paid</td>
                </tr>
              </thead>
              <tbody>
            @if(count($payments) > 0)
               @foreach($payments as $payment)   
                 <tr>
                     <td>{{$payment->feeID}}</td>
                     <td>{{$payment->date_received}}</td>
                     <td>{{$payment->deposit_paid}}</td>
                 </tr>
             @endforeach
         @endif
        </tbody>
        </table>
        </div>
      </div>
</div>
<button><a href="/login">BACK</a></button>

</div>

@endsection
