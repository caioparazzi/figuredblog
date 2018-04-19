@extends('layout_admin')
    @section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <h1>All Posts</h1>
        <div class="col-lg-8 col-md-10 mx-auto">
          @foreach ($posts as $post)
          <div class="post-preview">
            <a href="post.html">
              <h2 class="post-title">
                {{$post['title']}}
              </h2>
            </a>
            <p class="post-meta">Posted by
              <a href="#">{{$post['author']}}</a>
              on {{date('d/m/Y', strtotime($post['date']))}}</p>
          </div>
          <div>
            <a onclick="deletePost(this.getAttribute('data-delete'))" data-delete="{{$post['_id']}}" href="#">Delete Post</a> |
            <a href="{{action('PostController@edit',$post['_id'])}}">Edit Post</a>
          </div>
          <hr>
          @endforeach
          <!-- Pager -->
          <div class="clearfix">
            <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      function deletePost(id){
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: '/posts/'+id,
          type: 'DELETE',  // user.destroy
          success: function(result) {
              window.location.reload();
          },
          error: function(error){
            console.log(error);
          }
        });
      }
    </script>
    @stop
    