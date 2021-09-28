@extends('layouts.backend.app')
@section('content')
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 well" id="content">
                    <h1>All Users</h1>
                </div>
                <table class="table" id="usertable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Phone</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $item)
                    <tr>
                      <th scope="row">{{$item->id}}</th>
                      <td>{{$item->name}}</td>
                      <td>{{$item->email}}</td>
                      <td>{{$item->phone}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
            <!-- /.row -->
@endsection            
        