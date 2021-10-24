@extends('layouts.backend.center')
@section('content')

@php
use App\Models\Family;
use App\Models\Medicine;
$family = Family::where('id',$center->family_id)->first(); 
$medicine = Medicine::where('order_id',$center->id)->get(); 

@endphp

            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 well" id="content">
                    <h1>Order Information</h1>
                    <!-- <a href="{{url('customer/downloadpdf')}}/{{$center->id}}"><i class="fa fa-file-pdf-o"></i></a> -->
                </div>
                
                <div class="downpdf" id="content">
                    <div class="row">
                      <div class="col-md-12">
                          <div class="col-md-3">
                              <label>Center</label>
                              <div>{{$center->center_id}}</div>
                          </div>
                          <div class="col-md-3">
                            <label>Family Name</label>
                            <div>{{$family->name}}</div>
                          </div>
                          <div class="col-md-3">
                            <label>Date</label>
                            <div>{{$center->created_at}}</div>
                          </div>
                          
                      </div>

                    </div>  

                    <div class="row">
                      <div class="col-md-12">
                         <table class="table" id="usertable">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Type</th>
                                <th scope="col">Name</th>
                                <th scope="col">Qantity</th>
                                <th scope="col">Image</th>
                               
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($medicine as $item)
                            
                              <tr>
                                <th scope="row">{{$item->id}}</th>
                                <td>{{$item->type}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->quantity}}</td>                    
                                <td><img src="{{asset('public/')}}/{{$item->image}}" width="100px"></td>                    
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                         
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
        