@extends('layouts.backend.center')
@section('content')
          <div class="row" id="main" >
            <div class="col-sm-12 col-md-12 well" id="content">
                <h1>Add New Family</h1>
            </div>
          <section class="" >
          <form>
            <div class="loginusingemail">
            <!--  <div class="col-md-12"> 
              <div class="form-group col-md-12">
                <label for="exampleInputEmail1">Registration Number Of Family</label>
                <input type="text" name="r_number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Registration Number Of Family">
              </div> 
             
            </div> -->

          <div class="col-md-12">
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Family Name</label>
                <input type="text" name="f_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
              </div>  
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Phone Number</label>
                <input type="number" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Phone Numner" min="10" max="10">
              </div> 
              
            </div>
            <div class="col-md-12"> 
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1">City</label>
                <input type="text" name="city" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter City">
              </div>
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Email</label>
                <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email" min="10" max="10">
              </div> 
              
            </div>
            <div class="col-md-12">
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Date</label>
                <input type="date" name="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Date">
              </div>
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1">State</label>
                <input type="text" name="state" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter State">
              </div>
           
            </div>
            <div class="col-md-12">
              
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Address</label>
                <input type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Address">
              </div>
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Country</label>
                <input type="text" name="country" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Country">
              </div>
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Street Address</label>
                <input type="text" name="st_address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Street Address">
              </div>
            </div>

          


            <div class="col-md-12">
              <div class="form-group col-md-6">
                <button type="button" class="btn btn-primary createfamily">Create Family</button>
              </div>
            </div>  
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

  <style type="text/css">
    i.fa.fa-plus.addmore{
      cursor: pointer;
      color: red;
    }
  </style>
            <!-- /.row -->
@endsection            
        