<!-- extend master layout of Dashboard -->

@extends('layout.index') @section('title', 'Patient History')
<!-- page content -->
@section('content') @section('sidetitle', 'DMS')


            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Medicare N0</th>
                    <th>Patient Name</th>
                    <th>Attend By</th>
                    <th>Visit Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($patient_data as $key => $value)
                <tr>
                  <td>{{$value->medicare_no}}</td>
                  <td>{{$value->name}}</td>
                  <td>{{$value->doctor_name}}</td>
                  <td>{{date('d M Y - H:i A',strtotime($value->created_at))}}</td>
                  <!-- <td><a href ="#">Edit</a><span><a href="../../{{$value->report_file_path}}"><i class="fa fa-file-word"></i></a></span></td> -->
                  <td><!-- Example single danger button -->
                    <div class="btn-group">
                      <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu">
                        <li><a href="{{ action('PatientDetailsController@edit',$value->id) }}"><i class="fa fa-pencil-square-o"></i>Edit</a></li>
                        <li><a href="../../{{$value->report_file_path}}"><i class="fa fa-file-word-o"></i>Download Report</a></li>
                      </ul>
                    </div>
                  </td>
                </tr>
              @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Medicare N0</th>
                    <th>Patient Name</th>
                    <th>Attend By</th>
                    <th>Visit Date</th>
                    <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
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
