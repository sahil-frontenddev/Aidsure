@extends('layouts.backend.app')
@section('content')
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 well" id="content">
                    <h1>All Families</h1>
                </div>
               <table class="table" id="usertable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Family Registration Number</th>
                      <th scope="col">Phone Number</th>
                      <th scope="col">Members</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($family as $item)
                    @php

                    @endphp
                    <tr>
                      <th scope="row">{{$item->id}}</th>
                      <td>{{$item->family_id}}</td>
                      <td>{{$item->phone}}</td>
                      <td>{{count($item->getmembers)}}</td>
                      <td>{{$item->status}}</td>
                      <td class="fmlyactive">
                        <a href="{{url('/admin/viewfamily')}}/{{$item->id}}" data-status="not-approve" data-toggle="tooltip" data-placement="top" title="View Family"><i class="fa fa-eye"></i></a>
                        @if($item->status == 'approve')
                        <i class="fa fa-star active" data-id="{{$item->id}}" data-status="approve" data-status="not-approve" data-toggle="tooltip" data-placement="top" title="Click To Not approve"/>
                         
                        @else
                          <i class="fa fa-star" data-id="{{$item->id}}" data-status="not-approve" data-status="not-approve" data-toggle="tooltip" data-placement="top" title="Click To approve"/>
                        @endif
                      </td>
                     
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
        