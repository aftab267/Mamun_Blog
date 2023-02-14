@extends('layouts.app')

@section('mainsection')
@include('layouts.includes.banner')
@include('layouts.includes.trending')
<section class="section-sm">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8  mb-5 mb-lg-0">
                <h2 class="h5 section-title">Recent Post</h2>


              @foreach( $posts as $post)
                    <article class="card mb-4">
                        <div class="post-slider">
                            <img src="{{'images/post_thumbnails/'.$post->thumbnail}}" class="card-img-top" alt="post-thumb">
                            </div>
                        <div class="card-body">
                            <h3 class="mb-3"><a class="post-title" href="post-details.html">{{ $post->title }}</a></h3>
                            <ul class="card-meta list-inline">
                        {{-- <li class="list-inline-item">
                            <a href="author-single.html" class="card-meta-author">
                            <img src="{{asset('usr_assets/images/john-doe.jpg')}}">
                            <span>Mark Dinn</span>
                            </a>
                        </li> --}}
                        {{-- <li class="list-inline-item">
                            <i class="ti-timer"></i>2 Min To Read
                        </li> --}}
                        <li class="list-inline-item">
                            <i class="ti-calendar"></i>{{ date('d M Y'),strtotime($post->created_at) }}
                        </li>
                        <li class="list-inline-item">
                            Category: <b class="text-primary">{{ $post->category_name }}</b>
                        </li>
                        </ul>
                            <p>{{ $post->description }}</p>
                            <a href="post-details.html" class="btn btn-outline-primary">Read More</a>
                        </div>
                    </article>

              @endforeach

                <ul class="pagination justify-content-center">
                    <li class="page-item page-item active ">
                        <a href="#!" class="page-link">1</a>
                    </li>
                    <li class="page-item">
                        <a href="#!" class="page-link">2</a>
                    </li>
                    <li class="page-item">
                        <a href="#!" class="page-link">&raquo;</a>
                    </li>
                </ul>
        </div>

     {{-- rightbar --}}
     @include('layouts.includes.rightbar')

    </div>
            </div>
          </section>

@endsection
