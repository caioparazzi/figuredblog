    <!-- Page Header -->
    <header class="masthead" style="background-image: url({{asset('img/home-bg.jpg')}})">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>FiguredBlog</h1>
              <span class="subheading">Blog Application with Laravel and MongoDB</span>
              <br>
              <form action="/search" class="container center_div" class="form-group">
                @csrf
                <input type="text" class="form-control" placeholder="Search something..." class="form-control" maxlength="50" max="10" name="search">
                <br>
                <button type="submit" class="btn btn-default">Search</button>
              </form>
                <span class="subheading"></span>
            </div>
          </div>
        </div>
      </div>
    </header>