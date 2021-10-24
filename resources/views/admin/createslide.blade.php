@extends('layouts.backend.app')
@section('content')
          <div class="row" id="main" >
            <div class="col-sm-12 col-md-12 well" id="content">
                <h1>Add New Slide</h1>
            </div>
          <section class="" >
          <form method="post" id="upload-image-form">
            <div class="loginusingemail">
             <div class="col-md-12"> 
              <div class="form-group col-md-12">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div> 
              <div class="form-group col-md-12">
                <label for="exampleInputEmail1">Description</label>
                <input type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="form-group col-md-12">
                 <label for="exampleInputEmail1">Attach Image</label>
                 <input type="file" name="imagename" class="form-control uploadimage" id="inp" aria-describedby="emailHelp" >
                 <input type="hidden" name="attachimage" value="" class="attachimage">
              </div>
            </div>
        
            <div class="col-md-12">
              <div class="form-group col-md-6">
                <button type="button" class="btn btn-primary createslide">Create Slide</button>
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
  
  <script>
 function readFile() {
  
  if (this.files && this.files[0]) {
    
    var FR= new FileReader();
    
    FR.addEventListener("load", function(e) {
     
       $(".attachimage").val(e.target.result)

      var data = $('form').serialize();

		console.log(data);

      $.ajax({
            url: apiendpoint+'uploadimage',
            type: "post",
            headers: {
                        'Accept': 'application/json',
                        'Authorization': 'Bearer '+localStorage.getItem('ff_token'),
            },
            processData: false,
            data:data,
            async:false,
          }).done(function(res) {
          	
          	if(res.status == 'success'){
          		
          		$(".attachimage").val(res.image);
          		
          	}
          	
          })


    }); 
    
    FR.readAsDataURL( this.files[0] );
  }
  
}


document.getElementById("inp").addEventListener("change", readFile);
  </script>
            <!-- /.row -->
@endsection            
        