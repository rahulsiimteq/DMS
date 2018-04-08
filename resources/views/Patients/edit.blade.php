<!-- extend master layout of Dashboard -->
@extends('layout.index') @section('title', 'Patient Checkup')

<!-- page content -->
@section('content') @section('sidetitle', 'DMS')

<div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">

                   @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                  <div class="panel panel-default">
                  <div class="panel-heading">Patient Checkup</div>
                  <div class="panel-body">
                  <!-- Registration Form Open -->

                    {!! Form::open(['action' => 'PatientDetailsController@store', 'method'=> 'POST'] )!!}

                            <div class="row">
                                  <div class="form-group col-md-2 col-md-offset-1">
                                    {{Form::label('MedicareNO','MedicarNo')}}
                                  </div>
                                  <div class="form-group col-md-8">
                                    {{Form::text('medicare_no',$patientData['0']->medicare_no,['class' =>'form-control','readonly'=>true])}}
                                  </div>
                            </div>
                            <div class="row">
                                  <div class="fform-group col-md-2 col-md-offset-1">
                                    {{Form::label('name','PatientName')}}
                                  </div>
                                  <div class="form-group col-md-8">
                                    {{Form::text('name',$patientData['0']->name,['class' =>'form-control'])}}
                                  </div>
                                  @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="row">
                                  <div class="form-group col-md-2 col-md-offset-1">
                                    {{Form::label('details','Details')}}
                                  </div>
                                  <div class="form-group col-md-8">
                                    {{Form::textarea('details',$patientData['0']->details,['class' =>'form-control'])}}
                                  </div>
                            </div>
                            @if($patientData['0']->doctor_name != Auth::user()->name)
                            <div class="row">

                                  <div class="form-group col-md-2 col-md-offset-1">
                                    {{Form::label('doctor_name','Priviously Attended By')}}
                                  </div>
                                  <div class="form-group col-md-8">
                                    {{Form::text('doctor_name',$patientData['0']->doctor_name,['class' =>'form-control','readonly' => 'true'])}}
                                  </div>
                            </div>
                            @endif
                            <div class="row">

                                  <div class="form-group col-md-2 col-md-offset-1">
                                    {{Form::label('doctor_name','Attend By')}}
                                  </div>
                                  <div class="form-group col-md-8">
                                    {{Form::text('doctor_name',Auth::user()->name,['class' =>'form-control','readonly' => 'true'])}}
                                  </div>
                            </div>
                            <div class="row">
                                  <div class="form-group col-md-2 col-md-offset-1">
                                  </div>
                                  <div class="form-group col-md-8">
                                    {{Form::submit('Submit',['class' => 'btn btn-success pull-right'])}}
                                  </div>
                            </div>

                    {!! Form::close()!!}
                    <!-- Registration Form close -->
                  </div>
                </div>
        </div>
    </div>

@endsection
