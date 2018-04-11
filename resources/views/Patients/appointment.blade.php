<!-- extend master layout of Dashboard -->
@extends('layout.index') @section('title', 'Home Page')

<!-- page content -->
@section('content') @section('sidetitle', 'DMS')

<div class="row">
  <div class="col-md-12">
  <div class="box">
  <div class="box-header">
      <h3 class="box-title">Appointments</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
          <th>Medicare No</th>
          <th>Patient Name</th>
          <th>Last Visit Date</th>
          <th>Todays Appointment</th>
          <th>Action</th>
      </tr>
      </thead>
      <tbody>
        @foreach($patientDetails as $key => $value)
        @if($value->nextAppointment == date("Y-m-d"))
      <tr>
        <th>{{$value->medicare_no}}</th>
        <td>{{$value->name}}</td>
        <td>{{date('d M Y - H:i A',strtotime($value->created_at))}}</td>
        <td>{{$value->nextAppointment}}</td>
        <td><!-- Example single danger button -->
          <div class="btn-group">
            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Action <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
              <li><a href="{{ action('AppointmentController@update',$value->id) }}" class="btn btn-link" >
                  <i class="fa fa-pencil-square-o"></i>
              Edit  </a></li>
              <li> <a  class="btn btn-link">
                  <i class="fa fa-times" ></i>Cancel
                </a></li>
            </ul>
          </div>
        </td>
        <!-- <td><a href ="#">Edit</a><span><a href="../../{{$value->report_file_path}}"><i class="fa fa-file-word"></i></a></span></td> -->
      </tr>
      @endif
    @endforeach
      </tbody>

    </table>
  </div>
  <!-- /.box-body -->
</div>
</div>
</div>


@endsection
