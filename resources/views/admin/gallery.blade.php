@extends('layouts.backend.app')
@section('content')
          <div class="row" id="main" >
            <div class="col-sm-12 col-md-12 well" id="content">
                <h1>Gallery</h1>
            </div>
          <section class="" >
            <div class="row">
            <form method="post" id="upload-image-form">

                <div class="form-group col-md-4">
                   <label for="exampleInputEmail1">Upload Image</label>
                   <input type="file" name="imagename" class="form-control uploadimage" id="inp2" aria-describedby="emailHelp" >
                   <input type="hidden" name="attachimage" value="" class="attachimage">
                   <input type="hidden" id="inp" name="inp">

                </div>

            </form>
          </div>

          <div class="row">
            @foreach($gallery as $item)
              <div class="col-md-3">
                <img src="{{asset('/public')}}/{{$item->name}}" style="width:100%" />
                <i class="fa fa-times deleteimage" aria-hidden="true" data-id="{{$item->id}}"></i>

              </div>
            @endforeach
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
  i.fa.fa-times {
    position: absolute;
    font-size: 22px;
    color: red;
    cursor: pointer;
}
</style>
@endsection            
        