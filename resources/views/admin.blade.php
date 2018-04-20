@extends('layout_admin')
    @section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <h1>All Posts</h1>
        <div class="col-lg-8 col-md-10 mx-auto">
          @if($amount > 0)
            @foreach ($posts as $post)
              <div class="post-preview">
                <a href="/post/{{$post->_id}}">
                  <h2 class="post-title">
                    {{$post['title']}}
                  </h2>
                </a>
                <p class="post-meta">Posted by
                  <a href="#">{{$post['author']}}</a>
                  on {{date('d/m/Y', strtotime($post['date']))}}</p>
              </div>
            <div>
              <a onclick="deletePost(this.getAttribute('data-delete'))" data-delete="{{action('PostController@destroy',$post['_id'])}}" href="#">Delete Post</a> |
              <a href="{{action('PostController@edit',$post['_id'])}}">Edit Post</a>
            </div>
            <hr>
            @endforeach
          @else
          <br>
          <br>
          <br>
            <div class="post-preview">
              <h2>It seems you have nothing posted yet.</h2>
              <h2>Click <a href="{{url('admin/posts')}}">here</a> to add stuff</h2>
            </div>
          @endif
        </div>
      </div>
    </div>
    <script type="text/javascript">
      function deletePost(which){
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: which,
          type: 'DELETE',
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
    