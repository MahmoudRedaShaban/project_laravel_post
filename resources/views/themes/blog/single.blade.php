@extends('layouts.master')

@section('content')
    @include('partials.hero',['title'=> $blog->name ])

      <!--================ Start Blog Post Area =================-->
  <section class="blog-post-area section-margin">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
            <div class="main_blog_details">
                <img class="img-fluid" src="{{asset('/storage/blogs/').'/'.$blog->image}}" alt="{{ $blog->name }}">
                <a href="{{ $blog->name }}"><h4>{{ $blog->name }}</h4></a>
                <div class="user_details">
                  <div class="float-right mt-3 mt-sm-0">
                    <div class="media">
                      <div class="media-body">
                        <h5>{{ $blog->user->name }}</h5>
                        <p>{{ $blog->created_at->format("d M Y") }}</p>
                      </div>
                      <div class="d-flex">
                        <img width="42" height="42" src="{{asset('/storage/blogs/').'/'.$blog->image}}" alt="">
                      </div>
                    </div>
                  </div>
                </div>
                <p>{{$blog->description}}</p>
                    </div>

              <div class="comments-area">
                  <h4>{{ count($blog->comments) }} Comments</h4>

                @if (count($blog->comments) > 0)
                    @foreach ($blog->comments as $comment)
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="img/avatar.png" width="50px">
                                </div>
                                <div class="desc">
                                    <h5><a href="#">{{ $comment->name }}</a></h5>
                                    <p class="date">{{$comment->created_at->format('d M Y')}}</p>
                                    <p class="date">{{$comment->subject}}</p>
                                    <p class="comment">
                                        {{ $comment->message }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif






              </div>
              @session('comment-state')
              <div class="alert alert-success">{{session('comment-state')}}</div>
              @endsession
              <div class="comment-form">
                  <h4>Leave a Reply</h4>
                  <form method="POST" action="{{ route('comment.store') }}">
                    @csrf
                    <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                      <div class="form-group form-inline">
                        <div class="form-group col-lg-6 col-md-6 name">
                          <input type="text" class="form-control" id="name" placeholder="Enter Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'"  name="name" value="{{ old('name') }}">
                          <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="form-group col-lg-6 col-md-6 email">
                          <input type="email" class="form-control" id="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'"  name="email" value="{{ old('email') }}">
                          <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                      </div>
                      <div class="form-group">
                          <input type="text" class="form-control" id="subject" placeholder="Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'" name="subject" value="{{ old('subject') }}">
                          <x-input-error :messages="$errors->get('subject')" class="mt-2" />
                        </div>
                      <div class="form-group">
                          <textarea class="mb-10 form-control" rows="5" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""  >{{old('message')}}</textarea>
                          <x-input-error :messages="$errors->get('message')" class="mt-2" />
                        </div>
                      <button type="submit" class="button submit_btn">Post Comment</button>
                  </form>
              </div>
        </div>

        <!-- Start Blog Post Siddebar -->
        <div class="col-lg-4 sidebar-widgets">
          <div class="widget-wrap">
            <div class="single-sidebar-widget newsletter-widget">
              <h4 class="single-sidebar-widget__title">Newsletter</h4>
              <div class="form-group mt-30">
                <div class="col-autos">
                  <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter email'">
                </div>
              </div>
              <button class="mt-20 bbtns d-block w-100">Subcribe</button>
            </div>

            <div class="single-sidebar-widget post-category-widget">
              <h4 class="single-sidebar-widget__title">Catgory</h4>
              <ul class="mt-20 cat-list">
                <li>
                  <a href="#" class="d-flex justify-content-between">
                    <p>Technology</p>
                    <p>(03)</p>
                  </a>
                </li>
                <li>
                  <a href="#" class="d-flex justify-content-between">
                    <p>Software</p>
                    <p>(09)</p>
                  </a>
                </li>
                <li>
                  <a href="#" class="d-flex justify-content-between">
                    <p>Lifestyle</p>
                    <p>(12)</p>
                  </a>
                </li>
                <li>
                  <a href="#" class="d-flex justify-content-between">
                    <p>Shopping</p>
                    <p>(02)</p>
                  </a>
                </li>
                <li>
                  <a href="#" class="d-flex justify-content-between">
                    <p>Food</p>
                    <p>(10)</p>
                  </a>
                </li>
              </ul>
            </div>

            <div class="single-sidebar-widget popular-post-widget">
              <h4 class="single-sidebar-widget__title">Recent Post</h4>
              <div class="popular-post-list">
                <div class="single-post-list">
                  <div class="thumb">
                    <img class="card-img rounded-0" src="img/blog/thumb/thumb1.png" alt="">
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
                    <img class="card-img rounded-0" src="img/blog/thumb/thumb2.png" alt="">
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
                    <img class="card-img rounded-0" src="img/blog/thumb/thumb3.png" alt="">
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
      </div>
  </section>
  <!--================ End Blog Post Area =================-->


@endsection
