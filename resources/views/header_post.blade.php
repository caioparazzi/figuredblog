    <!-- Post Header -->
    <header class="masthead" style="background-image: url({{asset('img/home-bg.jpg')}})">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>{{$post->title}}</h1>
              <h2 class="subheading">{{$post->subtitle}}</h2>
                <span class="meta">Posted by
                {{$post->author}}
                on {{date('d/m/Y', strtotime($post['date']))}}</span>
            </div>
          </div>
        </div>
      </div>
    </header>