@extends('layouts.backend.app')
@section('content')
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 well" id="content">
                    <h1>All Orders</h1>
                </div>
                <table class="table" id="usertable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Center Number</th>
                      <th scope="col">Tablets</th>
                      <th scope="col">Capsules</th>
                      <th scope="col">Syrup</th>
                      <th scope="col">Injection</th>
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
                      <td>{{$item->unique_number}}</td>
                      <td>{{$item->tablets}}</td>
                      <td>{{$item->capsules}}</td>
                      <td>{{$item->syrup}}</td>
                      <td>{{$item->injection}}</td>
                      <td>{{$item->status}}</td>
                      <td class="makeactiveOrder">
                        @if($item->status == 'approve')
                         <i class="fa fa-star active" data-id="{{$item->id}}" data-status="not-approve"/>
                        @else
                         <i class="fa fa-star" data-id="{{$item->id}}" data-status="approve"/>
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
        