@extends('layout')
    @include('header')
    @section('content')
    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          @foreach ($posts as $post)
          <div class="post-preview">
            <a href="post/{{$post->_id}}">
              <h2 class="post-title">
                {{$post['title']}}
              </h2>
              <h3 class="post-subtitle">
                {{$post['subtitle']}}
              </h3>
            </a>
            <p class="post-meta">Posted by
              <a href="#">{{$post['author']}}</a>
              on {{date('d/m/Y', strtotime($post['date']))}}</p>
          </div>
          @endforeach
          <!-- Pager -->
          <div class="clearfix">
            <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
          </div>
        </div>
      </div>
    </div>
    @stop
    