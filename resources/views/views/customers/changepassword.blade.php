@extends('layouts.backend.center')
@section('content')
          <div class="row" id="main" >
            <div class="col-sm-12 col-md-12 well" id="content">
                <h1>Change Password</h1>
            </div>
          <section class="" >
          <form>
            <div class="loginusingemail">
         
          <div class="col-md-12"> 
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1">New Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Password" min="10" max="10">
              </div> 
             
            <div class="col-md-12">
              <div class="form-group col-md-6">
                <button type="button" class="btn btn-primary changepassword">Change</button>
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
        