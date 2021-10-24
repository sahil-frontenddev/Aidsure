@extends('layouts.frontend.app')

@section('content')

  <main id="main">

      <section class="customer_login" >
          <form>
            <div class="loginusingemail">
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="useremail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="userpassword" class="form-control" id="exampleInputPassword1" placeholder="Password">
              </div>
              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
              </div>
              
              
            </div> 
            <div class="form-group"> 
                <a href="https://aidsure.live/password/reset">Forgot Password?</a>
              </div>
           
            <button type="button" class="btn btn-primary adminlogin">Login</button>
          </form>
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
          <!-- div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div> -->
        </div>
      </div>
    </div>

  </main><!-- End #main -->

@endsection