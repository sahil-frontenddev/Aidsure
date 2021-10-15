@extends('layouts.backend.app')
@section('content')
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 well" id="content">
                    <h1>All Slides</h1>
                </div>
                <table class="table" id="usertable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Title</th>
                      <th scope="col">Description</th>
                      <th scope="col">Image</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($centers as $item)
                    <tr>
                      <th scope="row">{{$item->id}}</th>
                      <th scope="row">{{$item->title}}</th>
                      <td>{{$item->description}}</td>
                      <td><img src="{{asset('public/')}}/{{$item->image}}" style="width:50px" /></td>
                      <td><a href="{{url('/admin/editslide')}}/{{$item->id}}">Edit</a></td>
                     
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>


            <style type="text/css">
              i.fa.fa-star.active {
    color: green;
}
.fa{
  cursor: pointer;
}
            </style>
            <!-- /.row -->
@endsection            
        