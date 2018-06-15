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
              <h3 class="box-title"></h3>
               </div>
                <!-- /.box-header -->
                <div class="box-body">
                 <table id="" class="table table-bordered table-striped" width="100%">
                  <thead>
                  <tr>
                    <td bgcolor="#999999">STUDENT NAME</td>
                    <td bgcolor="#999999">PHONE NUMBER</td>
                    <td bgcolor="#999999">COURSE NAME</td>
                    <td bgcolor="#999999">ADMISSION ID</td>
                    <td bgcolor="#999999">ADMISSION DATE</td>
                  </tr>
                </thead>
                <tbody>
                   <tr>
                       <td>{{$student->studentname}}</td>
                       <td>{{$student->phone_no}}</td>
                       <td>{{$student->coursename }}</td>
                       <td>{{$student->admission_no}}</td>
                       <td>{{$student->start_date}}</td>
                   </tr>
             </tbody>

          </table>
        </div>
      </div>
      <div class="box-body">
      <form  action="{{ url ("/passStudent/{$student->id}") }}" method="POST">
              <div class="form-row">
                <div class="col-md-4">
                        {{ csrf_field() }}
                    <button type="submit" align="center" class="btn btn-primary btn-block btn-flat">PASS STUDENT</button>
                </div>
              </div>
      </form>
      </div>
    </div>
</div>
</div>

@endsection
