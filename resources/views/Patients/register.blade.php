<!-- extend master layout of Dashboard -->
@extends('layout.index') @section('title', 'Register Page')
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
  <div class="panel-heading">Patient Registration</div>
  <div class="panel-body">
    <!-- Registration Form Open -->
    {!! Form::open(['action' => 'PatientController@store', 'method'=> 'POST'] )!!}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                  <div class="form-group col-md-2 col-md-offset-1">
                    {{Form::label('MedicareNO','MedicarNo : ')}}
                  </div>
                  <div class="form-group col-md-8">
                    {{Form::text('medicare_no','',['class' =>'form-control'])}}
                  </div>
            </div>
            <div class="row">
                  <div class="form-group col-md-2 col-md-offset-1">
                    {{Form::label('patientName','PatientName : ')}}
                  </div>
                  <div class="form-group col-md-8">
                    {{Form::text('patientName','',['class' =>'form-control'])}}
                  </div>
            </div>

            <div class="row">
                  <div class="form-group col-md-2 col-md-offset-1">
                    {{Form::label('email','Email : ')}}
                  </div>
                  <div class="form-group col-md-8">
                    {{Form::text('email','',['class' =>'form-control'])}}
                  </div>
            </div>

            <div class="row">

                  <div class="form-group col-md-2 col-md-offset-1">
                    {{Form::label('contact','Contact : ')}}
                  </div>
                  <div class="form-group col-md-8">
                    {{Form::text('contact','',['class' =>'form-control'])}}
                  </div>
            </div>

            <div class="row">

                  <div class="form-group col-md-2 col-md-offset-1">
                    {{Form::label('doctor_name','Doctor Name : ')}}
                  </div>
                  <div class="form-group col-md-8">
                    {{Form::text('registerBy',Auth::user()->name,['class' =>'form-control','readonly' => 'true'])}}
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
