@extends('layouts.master')

@section('content')
    @include('partials.hero',['title'=>$blog->name])

  <!-- ================ contact section start ================= -->
  <section class="section-margin--small section-margin">
    <div class="container">
      <div class="row">
       @session('blog-state')
       <div class="alert alert-success">{{session('blog-state')}}</div>
       @endsession
        <div class="col-12">
          <form action="{{route('blogs.update',['blog'=>$blog])}}" class="form-contact contact_form"  method="post" novalidate="novalidate" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <input class="border form-control" name="name" id="name" type="text" placeholder="Enter your Title Blogs" value="{{$blog->name}}">
                  <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div class="form-group">
                  <input class="border form-control" name="image" id="image" type="file"  value="{{old('image')}}">
                  <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <select class="border form-control" name="category_id" id="category_id" >
                    @if (count($categories) > 0)
                        @foreach ($categories as $cat )
                            <option value="{{ $cat->id }}" @selected($blog->category_id == $cat->id) >{{$cat->name}}</option>
                        @endforeach
                        @else
                        <option value="">Select</option>
                    @endif
                </select>
                  <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                </div>
                <div class="form-group">
                  <textarea class="border form-control" name="description" type="description"  row="3">
                    {{ $blog->description }}
                  </textarea>
                  <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
              </div>
            </div>
            <div class="mt-3 text-center form-group text-md-right">
              <button type="submit" class="button button--active button-contactForm">Update</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </section>
	<!-- ================ contact section end ================= -->


@endsection
