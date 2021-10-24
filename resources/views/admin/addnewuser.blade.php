@extends('layouts.backend.app')
@section('content')
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 well" id="content">
                    <h1>Add New Sub Admin</h1>
                </div>
                      <section class="" >
          <form>
            <div class="loginusingemail">
             <div class="col-md-12"> 
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
              </div> 
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="youremail" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                
              </div>
            </div>
            <div class="col-md-12"> 
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Phone Number</label>
                <input type="number" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Phone Numner" min="10" max="10">
              </div> 
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1">City</label>
                <input type="text" name="city" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter City">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1">State</label>
                <input type="text" name="state" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter State">
              </div>
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Address</label>
                <input type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Address">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group col-md-6">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
              </div>
            </div>
              <!-- <div class="form-group form-check">
                <input type="checkbox" name="checkmeout" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
              </div> -->
            </div> 
            <div class="col-md-12">
              <div class="form-group col-md-6">
                <button type="button" class="btn btn-primary createuser">Add New User</button>
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
          <!-- div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div> -->
        </div>
      </div>
    </div>
            </div>
            <!-- /.row -->
@endsection            
        