@extends('layouts.backend.center')
@section('content')
          <div class="row" id="main" >
            <div class="col-sm-12 col-md-12 well" id="content">
                <h1>Add New Family</h1>
            </div>
          <section class="" >
          <form>
            <div class="loginusingemail">
             <div class="col-md-12"> 
              <div class="form-group col-md-12">
                <label for="exampleInputEmail1">Registration Number Of Family</label>
                <input type="text" name="r_number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
              </div> 
             
            </div>
           <div class="col-md-12"> 
	           	<h2 class="col-md-9">Add Multiple</h2>
	           	<span class="addmore col-md-3">Add</span>
           </div>
            <div class="col-md-12"> 
              <div class="form-group col-md-4">
                <label for="exampleInputEmail1">Name</label>
              </div> 
              <div class="form-group col-md-4">
                <label for="exampleInputEmail1">Adhar Number</label>
                
              </div>
              <div class="form-group col-md-4">
                <label for="exampleInputEmail1">Signature</label>
                
              </div>
            </div>
            <div class="multile">

	            <div class="col-md-12"> 
	              <div class="form-group col-md-4">
	               
	                <input type="number" name="name[]" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" min="10" max="10">
	              </div> 
	              <div class="form-group col-md-4">
	                
	                <input type="text" name="adh[]" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Adhar Number">
	              </div>
	              <div class="form-group col-md-4">
	                
	                <input type="text" name="sign[]" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Signature">
	              </div>
	            </div>
	        </div>    
            


            </div> 
            <div class="col-md-12">
              <div class="form-group col-md-6">
                <button type="button" class="btn btn-primary createcenter">Register</button>
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
        