@extends('layout')
    @include('header_post')
    @section('content')
    <!-- Post Content -->
    <article>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            {{$post->body}}
          </div>
        </div>
      </div>
    </article>
    @stop
    