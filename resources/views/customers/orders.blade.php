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
                      <th scope="col">Tablets</th>
                      <th scope="col">Capsules</th>
                      <th scope="col">Syrup</th>
                      <th scope="col">Injection</th>
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
                      <td>{{$item->tablets}}</td>
                      <td>{{$item->capsules}}</td>
                      <td>{{$item->syrup}}</td>
                      <td>{{$item->injection}}</td>
                      <td>{{$item->created_at}}</td>
                      <td>{{$item->status}}</td>
                      <td><a href="{{url('/customer/orderview')}}/{{$item->id}}"><i class="fa fa-eye"></i></a></td>
                     
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
            <!-- /.row -->
@endsection            
        