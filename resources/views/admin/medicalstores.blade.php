@extends('layouts.backend.app')
@section('content')
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 well" id="content">
                    <h1>All Medical Stores</h1>
                </div>
                <table class="table" id="usertable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Phone</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($centers as $item)
                    <tr>
                      <th scope="row">{{$item->id}}</th>
                      <td>{{$item->name}}</td>
                      <td>{{$item->email}}</td>
                      <td>{{$item->phone}}</td>
                      <td>{{$item->status}}</td>
                      <td class="makeactivestore">
                        <a href="{{url('/admin/storeview')}}/{{$item->id}}" data-status="not-approve" data-toggle="tooltip" data-placement="top" title="View Medical Store"><i class="fa fa-eye"></i></a>
                        @if($item->status == 'approve')
                        
                        <i class="fa fa-star active" data-id="{{$item->id}}" data-status="not-approve" data-status="not-approve" data-toggle="tooltip" data-placement="top" title="Click To Not approve"/>
                         
                        @else
                         <i class="fa fa-star" data-id="{{$item->id}}" data-status="approve" data-status="not-approve" data-toggle="tooltip" data-placement="top" title="Click To approve"/>
                        @endif
                    </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
            <!-- /.row -->
            <style type="text/css">
              i.fa.fa-star.active {
    color: green;
}
.fa{
  cursor: pointer;
}
            </style>
@endsection            
        