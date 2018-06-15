<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Autoškola Tintilinić | Access Student Data</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset("bower_components/bootstrap/dist/css/bootstrap.min.css")}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset("bower_components/font-awesome/css/font-awesome.min.css")}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset("bower_components/Ionicons/css/ionicons.min.css")}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset("dist/css/AdminLTE.min.css")}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset("plugins/iCheck/square/blue.css")}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>
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
&nbsp&nbsp&nbsp
<button><a href="/login">BACK</a></button>

</div>
</body>
</html>