<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Post</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Add Post</h1>
            <a href="{{ route('blog_posts') }}" class="btn btn-secondary">Back to Dashboard</a>
        </div>

        <div id="addPostForm" class="mt-4">
            <form action="{{ route('post.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>

                <div class="form-group">
                    <label for="content">Content:</label>
                    <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Add Post</button>
            </form>
        </div>
    </div>

    @if(isset($error))
        <p class="error">{{ $error }}</p>
    @endif

</body>
</html>
