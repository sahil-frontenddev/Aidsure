@extends('layouts.backend.center')
@section('content')
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 well" id="content">
                    <h1>Order Information</h1>
                    <!-- <a href="{{url('customer/downloadpdf')}}/{{$center->id}}"><i class="fa fa-file-pdf-o"></i></a> -->
                </div>
                
                <div class="downpdf" id="content">
                    <div class="row">
                      <div class="col-md-12">
                          <div class="col-md-3">
                              <label>Tablets</label>
                              <div>{{$center->tablets}}</div>
                          </div>
                          <div class="col-md-3">
                            <label>Capsules</label>
                            <div>{{$center->capsules}}</div>
                          </div>
                          <div class="col-md-3">
                            <label>Syrup</label>
                            <div>{{$center->syrup}}</div>
                          </div>
                          <div class="col-md-3">
                            <label>Injection</label>
                            <div>{{$center->injection}}</div>
                          </div>
                      </div>

                    </div>  

                    <div class="row">
                      <div class="col-md-12">
                         <div class="col-md-3">
                            <label>Sergical</label>
                            <div>{{$center->sergical}}</div>
                          </div>
                          <div class="col-md-3">
                            <label>Image</label>
                            <div><img src="{{asset('public/')}}/{{$center->image}}" width="100px"></div></div>
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
        