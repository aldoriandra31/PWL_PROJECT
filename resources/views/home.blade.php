@extends('templates.guest')
@section('content')
<div class="container">
  <div class="container position-relative aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
    <div class="row>
      <div class="col">
        <div class="align-items-center">
          <img src="{{ asset('assets/dist/img/logo/logosekolah.png') }}" alt="" class="rounded mx-auto d-block" width="25%">
        </div>
        <div class="text-center">
          <h1 style="font-size:4vw;">Selamat Datang Di Aplikasi Tatib</h1>
          <h1 style="font-size:3vw;">SMAN NEGERI 1 AMBUNTEN</h1>
          <div class="text-center"> <a href="{{ route('login') }}" class="btn btn-primary btn-lg mt-3">Get Started</a></div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection