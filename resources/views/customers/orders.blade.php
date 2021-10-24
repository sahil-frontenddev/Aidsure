@extends('layouts.backend.center')
@section('content')
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 well" id="content">
                    <h1>All Orders</h1>
                </div>
                <table class="table" id="usertable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Center Id</th>
                      <th scope="col">Family Number</th>
                      <th scope="col">Date</th>
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
                      <td>{{$item->center_id}}</td>
                      <td>{{$item->family_id}}</td>
                      <td>{{$item->created_at}}</td>
                      <td>{{$item->status}}</td>
                      <td>
                       @if($item->status == "approve")    
                          <a href="{{url('/customer/orderview')}}/{{$item->id}}"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="View Order"></i></a>
                       
                        <i class="fa fa-trash " data-toggle="tooltip" data-placement="top" title="You can not delete order. Its already approved."></i>
                       @else
                        <i class="fa fa-trash deleteorder" data-toggle="tooltip" data-placement="top" title="Delete Order" data-id="{{$item->id}}" data-status="not-approve"></i>
                       @endif 
                      </td>
                     
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>

            <style type="text/css">
              i.fa.fa-trash.deleteorder {
                  color: red;
                  cursor: pointer;
              }
            </style>

            <!-- /.row -->
@endsection            
        