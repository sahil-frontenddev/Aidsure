@extends('layouts.frontend.app')

@section('content')
@php
use App\Models\User;
use App\Models\Hospital;
use App\Models\Order;
use App\Models\Laboratory;
use App\Models\Family;
use App\Models\Slide;

$users = User::where('status','approve')->get();
$hospital = Hospital::where('status','approve')->get();
$family = Family::where('status','approve')->get();
$slide = Slide::get();


@endphp
  <!-- ======= Hero Section ======= -->
  <section id="about">

      <div class="container">
            <h2>Welcome to <span>AIDSURE</span></h2>
            <p>Aidsure Mission is to finish the commissions in medical field which reached at 40-45 % goes to agents who refer the patient. Due to which the treatment prices are very high and some people are not able to afford treatment in good Hospitals.</p>
           
          </div>
  
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

@endsection