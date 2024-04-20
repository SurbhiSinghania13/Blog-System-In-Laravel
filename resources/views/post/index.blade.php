<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Blogs</h1>
            <a href="{{ route('post.create') }}" class="btn btn-primary">Add Post</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
            
                <button type="submit" class="btn btn-primary ml-3" id="loginButton">Logout</button>
            </form>
        </div>

        <div id="blogs" class="mt-4">
            @foreach($blogPosts as $post)
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">{{ $post->title }}</h2>
                        <p class="card-text">{{ $post->content }}</p>
                        <p class="card-text"><small class="text-muted">Published on: {{ $post->post_date }}</small></p>
                        <a href="{{ route('post.edit', ['post_id' => $post->id]) }}" class="btn btn-warning">Update</a>
                        <form id="delete-post-form-{{$post->id}}" action="{{ route('post.destroy', ['post_id' => $post->id]) }}" method="POST" style="display: inline;">
                         @csrf
                         @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
                <hr>
            @endforeach

            @if(count($blogPosts) === 0)
                <p>No blog posts found.</p>
            @endif
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
