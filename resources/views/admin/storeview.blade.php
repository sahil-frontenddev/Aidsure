@extends('layouts.backend.app')
@section('content')
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 well" id="content">
                    <h1>Medical Store Information</h1>
                    <!-- <a href="{{url('customer/downloadpdf')}}/{{$center->id}}"><i class="fa fa-file-pdf-o"></i></a> -->
                </div>
                
                <div class="downpdf" id="content">
                    <div class="row">
                      <div class="col-md-12">
                          <div class="col-md-3">
                              <label>Name</label>
                              <div>{{$center->name}}</div>
                          </div>
                          <div class="col-md-3">
                            <label>Email</label>
                            <div>{{$center->email}}</div>
                          </div>
                          <div class="col-md-3">
                            <label>City</label>
                            <div>{{$center->city}}</div>
                          </div>
                          <div class="col-md-3">
                            <label>State</label>
                            <div>{{$center->state}}</div>
                          </div>
                      </div>

                    </div>  

                    <div class="row">
                      <div class="col-md-12">
                         <div class="col-md-3">
                            <label>Speciality</label>
                            <div>{{$center->speciality}}</div>
                          </div>
                          <div class="col-md-3">
                            <label>Doctor Name</label>
                            <div>{{$center->doctor_name}}</div>
                          </div>
                          <div class="col-md-3">
                            <label>Phone</label>
                            <div>{{$center->phone}}</div>
                          </div>
                          <div class="col-md-3">
                            <label>Address</label>
                            <div>{{$center->address}}</div>
                          </div>
                      </div>

                    </div>  

                   
                </div>
            </div>
            <style type="text/css">
              .row{
                margin-bottom: 20px;
              }
              div#content i {
    padding-left: 20px;
    font-size: 22px;
    color: red;
}
div#content h1, div#content i {
    display: inline-block;
}
            </style>
            
            <!-- /.row -->
@endsection            
        