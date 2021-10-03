@extends('layouts.backend.center')
@section('content')
          <div class="row" id="main" >
            <div class="col-sm-12 col-md-12 well" id="content">
                <h1>Add New Order</h1>
            </div>
          <section class="" >
          <form method="post" id="upload-image-form">
            <div class="loginusingemail">
             <div class="col-md-12"> 
              <div class="form-group col-md-12">
                <label for="exampleInputEmail1">Registration Number Of Family</label>
                <input type="text" name="r_number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div> 
             
            </div>
          
            <div class="col-md-12"> 
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Tablets</label>
                <input type="text" name="tablets" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div> 
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Capsules</label>
                <input type="text" name="capsules" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Syrup</label>
                <input type="text" name="syrup" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Injection</label>
                <input type="text" name="injection" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
            </div>
            <div class="col-md-12">
              
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Sergical Item</label>
                <input type="text" name="sergical" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
            </div>
            <div class="col-md-12">
              
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Attach Image</label>
                <input type="file" name="imagename" class="form-control uploadimage" id="inp" aria-describedby="emailHelp" >
                <input type="hidden" name="attachimage" value="" class="attachimage">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group col-md-6">
                <button type="button" class="btn btn-primary createorder">Register</button>
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
            <!-- /.row -->
@endsection            
        