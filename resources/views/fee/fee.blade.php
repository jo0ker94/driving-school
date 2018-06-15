@extends('admin_template')

@section('content')
    <div class="row">
        <div class="col-xs-12">
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
                    <h3 class="box-title">PAYMENTS</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <td bgcolor="#999999">STUDENT NAME</td>
                            <td bgcolor="#999999">PHONE NUMBER</td>
                            <td bgcolor="#999999">ADMISSION NO</td>
                            <td bgcolor="#999999">ADMISSION DATE</td>
                            <td bgcolor="#999999">PAYMENT</td>
                        </tr>

                        </thead>

                        <tbody>
                        @if(count($students) > 0)
                            @foreach($students as $student)
                                <tr>
                                    <td>{{$student->studentname}}</td>
                                    <td>{{$student->phone_no}}</td>
                                    <td>{{$student->admission_no}}</td>
                                    <td>{{$student->start_date}}</td>
                                    <td><a href="{{url("/fetch/{$student->id}")}}">PAYMENTS</a></td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>


                    </table>
                </div>
                <!-- /.box-body -->

            </div>

        </div>
    </div>
@endsection
@section('scripts')


@endsection
