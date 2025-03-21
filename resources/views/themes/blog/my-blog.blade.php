@extends('layouts.master')

@section('content')
    @include('partials.hero',['title'=>'My Blogs'])

  <!-- ================ contact section start ================= -->
  <section class="section-margin--small section-margin">
    <div class="container">
      <div class="row">
        @session('blog-state')
        <div class="alert alert-success">{{session('blog-state')}}</div>
        @endsession
        @session('state-delete')
        <div class="alert alert-success">{{session('state-delete')}}</div>
        @endsession
        <div class="col-12">

            <table class="table">
                <thead>
                  <tr>
                    <th scope="col" width='5%'>#</th>
                    <th scope="col">Title</th>
                    <th  scope="col" width='15%'>Action</th>

                  </tr>
                </thead>
                <tbody>

                    @if (count($blogs)> 0)
                    @foreach ($blogs as $blog)
                    <tr>
                        <th scope="row">{{ $blog->id }}</th>
                        <td><a href="{{ route('blogs.show',$blog) }}" target="_blank"  >{{$blog->name}}</a></td>
                        <td>

                            <form class="d-inline" action="{{   route('blogs.destroy', ['blog'=> $blog]) }}" method="post" id="formulate">@csrf @method('delete')</form>
                            <a type="button" class="btn btn-danger" href="javascript:$('form#formulate').submit()">Delete</a>
                            <a type="button" class="btn btn-primary" href="{{ route('blogs.edit', ['blog'=> $blog]) }}">Edit</a>
                        </td>
                      </tr>
                    @endforeach
                    @endif


                </tbody>
              </table>
              @if (count($blogs)> 0)
              {{ $blogs->render('pagination::bootstrap-4') }}
              @endif
        </div>
      </div>
    </div>
  </section>
	<!-- ================ contact section end ================= -->


@endsection
