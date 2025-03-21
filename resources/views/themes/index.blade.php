@extends('layouts.master')
@section('home-active', 'active')
@section('content')
<main class="site-main">
    @include('partials.hero-home')

   {{-- @include('partials.sidbar') --}}

<!--================ Start Blog Post Area =================-->
<section class="mt-4 blog-post-area section-margin">
 <div class="container">
   <div class="row">
     <div class="col-lg-8">
        @if (count($blogs) > 0)
        @foreach ($blogs as $blog)
        <div class="single-recent-blog-post">
            <div class="thumb">
              <img  class="img-fluid w-100" src="{{asset("storage/blogs/$blog->image")}}" alt="">
              <ul class="thumb-info">
                <li><a href="#"><i class="ti-user"></i>{{ $blog->user->name }}</a></li>
                <li><a href="#"><i class="ti-notepad"></i>{{ $blog->created_at->format('d M Y') }}</a></li>
                <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
              </ul>
            </div>

            <div class="mt-20 details">
              <a href="blog-single.html">
                <h3>{{$blog->name}}</h3>
              </a>
              <p>{{Str::substr($blog->description, 0, 200) }}</p>
              <a class="button" href="{{ route('blogs.show', $blog->id) }}">Read More <i class="ti-arrow-right"></i></a>
            </div>
          </div>
        @endforeach
    @endif




       <div class="row">
         <div class="col-lg-12">
            {{ $blogs->render('pagination::bootstrap-4') }}
         </div>
       </div>
     </div>

    @include('partials.sidbar')
   </div>
</section>
<!--================ End Blog Post Area =================-->
</main>
@endsection
