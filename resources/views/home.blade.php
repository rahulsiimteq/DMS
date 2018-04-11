<!-- extend master layout of Dashboard -->
@extends('layout.index') @section('title', 'Home Page')

<!-- page content -->
@section('content') @section('sidetitle', 'DMS')

      <div class="row">
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3>{{$count}}</h3>

                <p>Patients</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="/patient/register" class="small-box-footer">Register Here <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3>{{$count_details}}</h3>

                <p>Todays Patient Visit</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="/patient/checkup" class="small-box-footer">Enter Patient Details <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3>{{$count_doctor}}</h3>

                <p>Doctors</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="#" class="small-box-footer"> Register Doctor <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3>{{$todays_appointment_count}}</h3>

                <p>Todays Appointment</p>
              </div>
              <div class="icon">
                <i class="fa fa-file-text"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
      </div>


      <div class="row">
        <div class="col-md-6">
        <div class="box">
        <div class="box-header">
            <h3 class="box-title">Todays Appointments</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Patient Name</th>
                <th>Last Visit Date</th>
                <th>Todays Appointment</th>
            </tr>
            </thead>
            <tbody>
              @foreach($patientDetails as $key => $value)
              @if($value->nextAppointment == date("Y-m-d"))
            <tr>
              <td>{{$value->name}}</td>
              <td>{{date('d M Y - H:i A',strtotime($value->created_at))}}</td>
              <td>{{$value->nextAppointment}}</td>
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
      <div class="col-md-6 pull-right">
      <div class="box">
      <div class="box-header">
          <h3 class="box-title">Patients Appointments</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
              <th>Patient Name</th>
              <th>Last Visit Date</th>
              <th>Next Appointment</th>
          </tr>
          </thead>
          <tbody>
            @foreach($patientDetails as $key => $value)
              @if($value->nextAppointment != date("Y-m-d"))
          <tr>
            <td>{{$value->name}}</td>
            <td>{{date('d M Y - H:i A',strtotime($value->created_at))}}</td>
            <td>{{$value->nextAppointment}}</td>
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
@section('body_script')
      <script type="text/javascript">
            $("#search").keyup(function(){
              _this = this;
              // Show only matching TR, hide rest of them
              $.each($("#search_data div div"), function() {
              if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                  $(this).hide();
                  else
                  $(this).show();
              });
            });
          </script>
@endsection
