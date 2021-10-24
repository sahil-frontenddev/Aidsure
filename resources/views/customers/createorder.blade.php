@extends('layouts.backend.center')
@section('content')

@php
use App\Models\User;
use App\Models\Family;
$user = User::where('role','customer')->get();
$family = family::where('status','approve')->get();
@endphp

          <div class="row" id="main" >
            <div class="col-sm-12 col-md-12 well" id="content">
                <h1>Add New Order</h1>
            </div>
          <section class="" >
          <form method="post" id="upload-image-form">
            <div class="loginusingemail">
             <div class="col-md-12"> 
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Registration Number Of Family</label>
                <select class="form-control selectpicker rnf" name="rnf" id="select-country" data-live-search="true">
                  <option data-tokens="">Select</option>
                  @foreach($family as $item) 
                  <option data-tokens="{{$item->family_id}}" value="{{$item->family_id}}">{{$item->family_id}}</option>
                  @endforeach
                </select>
              </div> 
             
            </div>
          
           <!--  <div class="col-md-12"> 
              <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Select Medicine</label>
                 <select class="form-control selectpicker med" name="med" id="select-med" data-live-search="true">
                 
                  <option data-tokens="Injection">Tablets</option>
                  <option data-tokens="Capsules">Capsules</option>
                  <option data-tokens="Syrup">Syrup</option>
                  <option data-tokens="Injection">Injection</option>
                  <option data-tokens="Injection">Sergical</option>
                 
                </select>
                <input type="hidden" name="medname" class="medname" >
              </div> 
              <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" class="form-control name" id="exampleInputEmail1" aria-describedby="emailHelp" >
              </div>
            
              <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Quantity</label>
                <input type="number" name="quantity" class="form-control quantity" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              
              <div class="form-group col-md-2">
                <label for="exampleInputEmail1">Attach Image</label>
                <input type="file" name="imagename" class="form-control uploadimage" id="inp" aria-describedby="emailHelp" >
                <input type="hidden" name="attachimage" value="" class="attachimage">
              </div>
              <div class="form-group col-md-1">
                <label for="exampleInputEmail1" class="addmedicine">Add</label>
               <input type="text" name="injection" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
            </div>
 -->
            <!-- <div class="col-md-12">
              <div class="form-group col-md-6">
                <button type="button" class="btn btn-primary createorder">Place Order</button>
              </div>
            </div> -->  
          </form>
      </section>
      <div class="modal fade" id="validationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Form Validation Error</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <ul class="valid-body">
              
            </ul>
            
          </div>
          
        </div>
      </div>
    </div>
  </div>
            <!-- /.row -->
@endsection            
        