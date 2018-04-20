@extends('layout_admin')
    @include('nav_admin')
    @section('content')
    <!-- Main Content -->
    <div class="container">
      <h1>Add new post</h1>
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <form action="{{url('admin/posts')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="title">Post title:</label>
                <input type="text" class="form-control" id="title" name="title" required>
                <label for="subtitle">Subtitle:</label>
                <input type="text" class="form-control" id="subtitle" name="subtitle" required>
              </div>
              <div class="form-group">
                <label for="postbody">Content:</label>
                <textarea rows='10' cols='30' class="form-control" id="postbody" name="postbody" required></textarea>
              </div>
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
      </div>
    </div>
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'postbody' );
    </script>
    @stop
    