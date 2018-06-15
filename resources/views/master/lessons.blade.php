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
      <form  action="{{ url ('/addLesson') }}" method="POST">
         <div class="form-row">
              <div class="col-md-4">
                 {{ csrf_field() }}
                 <div class="form-group has-feedback{{ $errors->has('studentname') ? ' has-error' : '' }}">
                   <select id="student_id" type="text" class="form-control" name="student_id">
                     <option value="">SELECT STUDENT</option>
                     @if(count($students) > 0)
                      @foreach($students->all() as $student)
                        <option value="{{$student->id}}">{{$student->studentname}}</option>
                      @endforeach
                     @endif
                   </select>
                   @if ($errors->has('student_id'))
                   <span class="help-block">{{ $errors->first('student_id') }}</span>
                   @endif
                 </div>
              </div>
            </div>
              <div class="form-row">
                <div class="col-md-4">
                   {{ csrf_field() }}
                   <div class="form-group has-feedback{{ $errors->has('start_time') ? ' has-error' : '' }}">
                     <input id="start_time" type="time" class="form-control" name="start_time" value="{{ old('start_time') }}" placeholder="Start time" required autofocus>
                     <span class="glyphicon glyphicon-calender form-control-feedback"></span>
                     @if ($errors->has('start_time'))
                     <span class="help-block">{{ $errors->first('start_time') }}</span>
                     @endif
                   </div>
                </div>
              </div>

              <div class="form-row">
                  <div class="col-md-4">
                     {{ csrf_field() }}
                     <div class="form-group has-feedback{{ $errors->has('start_date') ? ' has-error' : '' }}">
                       <input id="start_date" type="date" class="form-control" name="start_date" value="{{ old('start_date') }}" placeholder="Start date" required autofocus>
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
                       <div class="form-group has-feedback{{ $errors->has('lessons_no') ? ' has-error' : '' }}">
                         <input id="lessons_no" type="number" class="form-control" name="lessons_no" value="{{ old('lessons_no') }}" placeholder="Lesson hours" required autofocus>
                         <span class="glyphicon glyphicon-calender form-control-feedback"></span>
                         @if ($errors->has('lessons_no'))
                         <span class="help-block">{{ $errors->first('lessons_no') }}</span>
                         @endif
                       </div>
                    </div>
                  </div>
              <div class="form-row">
                <div class="col-md-4">
                    {{ csrf_field() }}
                    <div class="form-group has-feedback{{ $errors->has('lessons_no') ? ' has-error' : '' }}">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">ADD LESSON</button>
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
                <td bgcolor="#999999">INSTRUCTOR NAME</td>
                <td bgcolor="#999999">DATE</td>
                <td bgcolor="#999999">TIME</td>
                <td bgcolor="#999999">LESSON HOURS</td>
              </tr>
            </thead>

            <tbody>
            @if(count($lessons) > 0)
                @foreach($lessons  as $lesson)
               <tr>
                   <td>{{$lesson->studentname}}</td>
                   <td>{{$lesson->instructor}}</td>
                   <td>{{$lesson->start_date }}</td>
                   <td>{{$lesson->start_time}}</td>
                   <td>{{$lesson->lessons_no}}</td>
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
