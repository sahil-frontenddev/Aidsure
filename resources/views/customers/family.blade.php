@extends('layouts.backend.center')
@section('content')
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 well" id="content">
                    <h1>All Family</h1>
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
                      <td>
                      @if($item->status == "approve")
                      <a href="{{url('customer/viewfamily')}}/{{$item->id}}"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="View Family"></i></a>
                      @endif
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
            <!-- /.row -->
 @endsection              
        