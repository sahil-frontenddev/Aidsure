@extends('layouts.backend.app')
@section('content')
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 well" id="content">
                    <h1>Family Information</h1>
                    <!-- <a href="{{url('customer/downloadpdf')}}/{{$family->id}}"><i class="fa fa-file-pdf-o"></i></a> -->
                </div>
                
                <div class="downpdf" id="content">
                    <div class="row">
                      <div class="col-md-12">
                          <div class="col-md-3">
                              <label>Registration Number</label>
                              <div>{{$family->family_id}}</div>
                          </div>
                          <div class="col-md-3">
                            <label>Email</label>
                            <div>{{$family->email}}</div>
                          </div>
                          <div class="col-md-3">
                            <label>Country</label>
                            <div>{{$family->country}}</div>
                          </div>
                          <div class="col-md-3">
                            <label>Date</label>
                            <div>{{$family->date}}</div>
                          </div>
                      </div>

                    </div>  

                    <div class="row">
                      <div class="col-md-12">
                          <div class="col-md-3">
                              <label>City</label>
                              <div>{{$family->city}}</div>
                          </div>
                          <div class="col-md-3">
                            <label>State</label>
                            <div>{{$family->state}}</div>
                          </div>
                          <div class="col-md-3">
                            <label>Phone</label>
                            <div>{{$family->phone}}</div>
                          </div>
                          <div class="col-md-3">
                            <label>Address</label>
                            <div>{{$family->address}}</div>
                          </div>
                      </div>

                    </div>  

                    <div class="row">
                      <div class="col-md-12">
                        <h2>Family Members</h2>
                      </div>  
                       <div class="col-md-12">
                        
                          <div class="col-md-4">
                              <label>Name</label>
                             
                          </div>
                          <div class="col-md-4">
                            <label>Adhaar Number</label>
                            
                          </div>
                          <!-- <div class="col-md-4">
                            <label>Signature</label>
                            
                          </div> -->
                          
                      </div>
                      @foreach($family->getmembers as $item)
                      <div class="col-md-12">
                        
                          <div class="col-md-4">
                             
                              <div>{{$item->name}}</div>
                          </div>
                          <div class="col-md-4">
                            
                            <div>{{$item->adhar}}</div>
                          </div>
                          <!-- <div class="col-md-4">
                           
                            <div>{{$item->signature}}</div>
                          </div> -->
                          
                      </div>
                      @endforeach

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
        