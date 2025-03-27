 <!--================Hero Banner start =================-->
 <section class="mb-30px">
    <div class="container">
      <div class="hero-banner">
        <div class="hero-banner__content">
          <h3>Tours & Travels</h3>
          <h1>Amazing Places on earth</h1>
          <h4>December 12, 2018</h4>
        </div>
      </div>
    </div>
  </section>
  <!--================Hero Banner end =================-->

    <!--================ Blog slider start =================-->
    <section>
        <div class="container">
          <div class="owl-carousel owl-theme blog-slider">
            @if (count($blogSliders) > 0)
                @foreach ($blogSliders as $blog)
                <div class="card blog__slide text-center">
                    <div class="blog__slide__img">
                      <img class="card-img rounded-0" src="{{asset('storage/blogs/')}}/{{ $blog->image }}" alt="" height="150">
                    </div>
                    <div class="blog__slide__content">
                      <a class="blog__slide__label" href="{{ route('themes.categories', $blog->category) }}">{{ $blog->category->name }}</a>
                      <h3><a href="{{ route('blogs.show', $blog) }}">{{ $blog->name }}</a></h3>
                      <p>{{ $blog->created_at->format('d') }} days ago</p>
                    </div>
                  </div>
                @endforeach
            @endif



          </div>
        </div>
      </section>
      <!--================ Blog slider end =================-->
