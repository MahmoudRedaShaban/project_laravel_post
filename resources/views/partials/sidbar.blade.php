@php
$categories = App\Models\Category::get();
@endphp
 <!-- Start Blog Post Siddebar -->
 <div class="col-lg-4 sidebar-widgets">
    <div class="widget-wrap">
        @session('status')
            <div class="alert alert-success">{{session('status')}}</div>
        @endsession
      <form action="{{route('subscribe.store')}}" method="post">
        @csrf
        <div class="single-sidebar-widget newsletter-widget">
            <h4 class="single-sidebar-widget__title">Newsletter</h4>
            <div class="form-group mt-30">
              <div class="col-autos">
                <input type="email" class="form-control" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''"
                  onblur="this.placeholder = 'Enter email'"  name="email" value="{{old('email')}}">
                  @error('email')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
              </div>
            </div>
            <button type="submit" class="mt-20 bbtns d-block w-100">Subcribe</button>
          </div>
      </form>

      <div class="single-sidebar-widget post-category-widget">
        @if (count($categories) > 0)
            <h4 class="single-sidebar-widget__title">Category</h4>
        <ul class="mt-20 cat-list">
            @foreach ($categories as $category)
              <li>
                <a href="{{ route('themes.categories', ['id'=>$category->id]) }}" class="d-flex justify-content-between">
                  <p>{{$category->name}}</p>
                  <p>(03)</p>
                </a>
              </li>
            @endforeach
        </ul>
        @endif
    </div>


      <div class="single-sidebar-widget popular-post-widget">
        <h4 class="single-sidebar-widget__title">Recent Post</h4>
        <div class="popular-post-list">
          <div class="single-post-list">
            <div class="thumb">
              <img class="card-img rounded-0" src="{{asset('assets')}}/img/blog/thumb/thumb1.png" alt="">
              <ul class="thumb-info">
                <li><a href="#">Adam Colinge</a></li>
                <li><a href="#">Dec 15</a></li>
              </ul>
            </div>
            <div class="mt-20 details">
              <a href="blog-single.html">
                <h6>Accused of assaulting flight attendant miktake alaways</h6>
              </a>
            </div>
          </div>
          <div class="single-post-list">
            <div class="thumb">
              <img class="card-img rounded-0" src="{{asset('assets')}}/img/blog/thumb/thumb2.png" alt="">
              <ul class="thumb-info">
                <li><a href="#">Adam Colinge</a></li>
                <li><a href="#">Dec 15</a></li>
              </ul>
            </div>
            <div class="mt-20 details">
              <a href="blog-single.html">
                <h6>Tennessee outback steakhouse the
                  worker diagnosed</h6>
              </a>
            </div>
          </div>
          <div class="single-post-list">
            <div class="thumb">
              <img class="card-img rounded-0" src="{{asset('assets')}}/img/blog/thumb/thumb3.png" alt="">
              <ul class="thumb-info">
                <li><a href="#">Adam Colinge</a></li>
                <li><a href="#">Dec 15</a></li>
              </ul>
            </div>
            <div class="mt-20 details">
              <a href="blog-single.html">
                <h6>Tennessee outback steakhouse the
                  worker diagnosed</h6>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<!-- End Blog Post Siddebar -->
