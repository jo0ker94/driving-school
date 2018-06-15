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
      <div class="box-body">
      <form  action="{{ url ('/addStudent') }}" method="POST">
        <div class="form-row">
           <div class="col-md-4">
              {{ csrf_field() }}
              <div class="form-group has-feedback{{ $errors->has('studentname') ? ' has-error' : '' }}">
                <input id="studentname" type="text" class="form-control" name="studentname" value="{{ old('studentname') }}" placeholder="Student name" required autofocus>
                <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                @if ($errors->has('studentname'))
                <span class="help-block">{{ $errors->first('studentname') }}</span>
                @endif
              </div>
        </div>
        </div>
        
        <div class="form-row">
            <div class="col-md-4">
               {{ csrf_field() }}
               <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                 <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Student email" required autofocus>
                 <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                 @if ($errors->has('email'))
                 <span class="help-block">{{ $errors->first('email') }}</span>
                 @endif
               </div>
            </div>
         </div>

         <div class="form-row">
              <div class="col-md-4">
                 {{ csrf_field() }}
                 <div class="form-group has-feedback{{ $errors->has('coursename') ? ' has-error' : '' }}">
                   <select id="course_ID" type="text" class="form-control" name="course_ID">
                     <option value="">SELECT COURSE</option>
                     @if(count($course) > 0)
                      @foreach($course->all() as $course)
                        <option value="{{ $course->ID}}">{{$course->coursename}}</option>
                      @endforeach
                     @endif
                   </select>
                   @if ($errors->has('course_ID'))
                   <span class="help-block">{{ $errors->first('course_ID') }}</span>
                   @endif
                 </div>
              </div>
            </div>
         
          <div class="form-row">
            <div class="col-md-4">
               {{ csrf_field() }}
               <div class="form-group has-feedback{{ $errors->has('phone_no') ? ' has-error' : '' }}">
                 <input id="phone_no" type="text" class="form-control" name="phone_no" value="{{ old('phone_no') }}" placeholder="Phone number" required autofocus>
                 <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                 @if ($errors->has('phone_no'))
                 <span class="help-block">{{ $errors->first('phone_no') }}</span>
                 @endif
               </div>
            </div>
         </div>

            <div class="form-row">
                <div class="col-md-4">
                   {{ csrf_field() }}
                   <div class="form-group has-feedback{{ $errors->has('location') ? ' has-error' : '' }}">
                     <input id="location" type="text" class="form-control" name="location" value="{{ old('location') }}" placeholder="Location" required autofocus>
                     <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                     @if ($errors->has('location'))
                     <span class="help-block">{{ $errors->first('location') }}</span>
                     @endif
                   </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-4">
                   {{ csrf_field() }}
                   <div class="form-group has-feedback{{ $errors->has('start_date') ? ' has-error' : '' }}">
                     <input id="start_date" type="date" class="form-control" name="start_date" value="{{ old('start_date') }}" placeholder="Intake Date" required autofocus>
                     <span class="glyphicon glyphicon-calender form-control-feedback"></span>
                     @if ($errors->has('start_date'))
                     <span class="help-block">{{ $errors->first('start_date') }}</span>
                     @endif
                   </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-4">
                    {{ csrf_field() }}
                    <div class="form-group has-feedback{{ $errors->has('shift') ? ' has-error' : '' }}">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">ADD STUDENT</button>
                    </div>
                </div>
              </div>
      </form>
      </div>
    </div>

       <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
               </div>
                <!-- /.box-header -->
                <div class="box-body">
                 <table id="example1" class="table table-bordered table-striped" width="100%">
                  <thead>
                  <tr>
                    <td bgcolor="#999999">STUDENT NAME</td>
                    <td bgcolor="#999999">STUDENT EMAIL</td>
                    <td bgcolor="#999999">PHONE NUMBER</td>
                    <td bgcolor="#999999">LOCATION</td>
                    <td bgcolor="#999999">COURSE NAME</td>
                    <td bgcolor="#999999">ADMISSION ID</td>
                    <td bgcolor="#999999">ADMISSION DATE</td>
                    <td bgcolor="#999999">PASSED</td>
                  </tr>
                </thead>

                <tbody>
                @if(count($student) > 0)
                    @foreach($student  as $student)
                   <tr>
                       <td>{{$student->studentname}}</td>
                       <td>{{$student->email}}</td>
                       <td>{{$student->phone_no}}</td>
                       <td>{{$student->location}}</td>
                       <td>{{$student->coursename }}</td>
                       <td>{{$student->admission_no}}</td>
                       <td>{{$student->start_date}}</td>
                       @if($student->passed == 0) 
                       <td>No   <a href = {{url("/passStudent/{$student->id}")}} >Pass student</a></td>
                       @else
                        <td>Yes</td>
                       @endif
                   </tr>
               @endforeach
               @endif
             </tbody>

          </table>
        </div>
      </div>
</div>
</div>

@endsection
