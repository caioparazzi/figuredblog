@extends('layout')
    @include('header_post')
    @section('content')
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12&appId=387996605009865';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <!-- Post Content -->
    <article>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            {!!$post->body!!}
            <hr>
            <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator"></div>
          </div> 
        </div>
      </div>
    </article>
    @stop

    