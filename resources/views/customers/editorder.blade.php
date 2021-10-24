@extends('layouts.backend.center')
@section('content')

@php

@endphp

          <div class="row" id="main" >
            <div class="col-sm-12 col-md-12 well" id="content">
                <h1>Add Medicine To Order</h1>
            </div>
          <section class="" >
          <form method="post" id="upload-image-form">
            <div class="loginusingemail">
            
            <div class="col-md-12"> 
              <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Select Medicine</label>
                 <select class="form-control selectpicker med" name="med" id="select-med" data-live-search="true">
                 <option data-tokens="" value="">Select</option>
                  <option data-tokens="Injection">Tablets</option>
                  <option data-tokens="Capsules">Capsules</option>
                  <option data-tokens="Syrup">Syrup</option>
                  <option data-tokens="Injection">Injection</option>
                  <option data-tokens="Injection">Sergical</option>
                 
                </select>
                <input type="hidden" name="medname" class="medname" >
                <input type="hidden" name="order_id" value="{{$id}}" >
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
                <label for="exampleInputEmail1" class="addmedicine btn btn-primary">Add</label>
                <!-- <input type="text" name="injection" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> -->
              </div>
            </div>

            
          </form>

          <table class="table" id="usertable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Type</th>
                      <th scope="col">Name</th>
                      <th scope="col">Qantity</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($medicine as $item)
                    @php

                    @endphp
                    <tr>
                      <th scope="row">{{$item->id}}</th>
                      <td>{{$item->type}}</td>
                      <td>{{$item->name}}</td>
                      <td>{{$item->quantity}}</td>                    
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              <div class="col-md-12">
              <div class="form-group col-md-6">
                @if($family->order_status == "active")
                <a href="{{route('customer_order')}}" class="btn btn-primary createorder">Go to List</a>
                @endif
              </div>
            </div>  
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
    div#usertable_wrapper {
        padding-top: 40px !important;
        display: inherit;
    }
  </style>
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
        