@extends('layouts.master')

@section('content')
    @include('partials.hero',['title'=>'Login'])

      <!-- ================ contact section start ================= -->
  <section class="section-margin--small section-margin">
    <div class="container">
        <div class="row">
            <ul>

                @if(count($errors) > 0)
                @foreach ($errors as $error)
                    <li class="alert-warning">{{$error}}</li>
                @endforeach
                @enderror
            </ul>
        </div>
      <div class="row">
        <div class="mx-auto col-6">
          <form action="{{ route('login') }}" class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
            @csrf
            <div class="form-group">
              <input class="border form-control" name="email" id="email" type="email" value="{{old('email')}}" placeholder="Enter email address">
              <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="form-group">
              <input class="border form-control" name="password" id="name" type="password" placeholder="Enter your password">
            </div>
            <div class="mt-3 text-center form-group text-md-right">
              <button type="submit" class="button button--active button-contactForm">Login</button>
            </div>
            <a href="{{route('register')}}">Sign up instead ? </a>
          </form>
        </div>
      </div>
    </div>
  </section>
	<!-- ================ contact section end ================= -->

@endsection
