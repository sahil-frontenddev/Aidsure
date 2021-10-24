@extends('layouts.backend.center')
@section('content')
          <div class="row" id="main" >
            <div class="col-sm-12 col-md-12 well" id="content">
                <h1>Add Members</h1>
            </div>
          <section class="" >
          <form>
            <div class="loginusingemail">
  
         <!--  <div class="col-md-12"> 
              <h2 class="col-md-9">Add Multiple <i class="fa fa-plus addmore" aria-hidden="true"></i></h2>
             
           </div> -->
            <div class="col-md-12"> 
              <div class="form-group col-md-4">
                <label for="exampleInputEmail1">Name</label>
              </div> 
              <div class="form-group col-md-4">
                <label for="exampleInputEmail1">Adhar Number</label>
                
              </div>
              <input type="hidden" name="family_id" value="{{$id}}">
              <!-- <div class="form-group col-md-4">
                <label for="exampleInputEmail1">Signature</label>
                
              </div> -->
            </div>
            <div class="multile">

              <div class="col-md-12 rowc"> 
                <div class="form-group col-md-4">
                 
                  <input type="text" name="name" class="form-control fname" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" min="10" max="10">
                </div> 
                <div class="form-group col-md-4">
                  
                  <input type="number" name="adhaar" class="form-control adh" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Adhar Number">
                </div>
               
              </div>
               
          </div> 



            <div class="col-md-12">
              <div class="form-group col-md-6">
                <button type="button" class="btn btn-primary createmember">Add Member</button>
              </div>
            </div>  
          </form>

                    <table class="table" id="usertable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Adhaar Number</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($members as $item)
                    @php

                    @endphp
                    <tr>
                      <th scope="row">{{$item->id}}</th>
                      <td>{{$item->name}}</td>
                      <td>{{$item->adhar}}</td>
                                         
                    </tr>
                    @endforeach
                  </tbody>
                </table>
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
        