<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-3">

            </div>

            <div class="col-6">
                <h3>Create Post</h3>
                <form action="{{ route('posts.store')}}" method="POST">
                    {{-- url('posts')  --}}
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control @error('title')is-invalid @enderror" id="title" name="title" placeholder="Enter Post Title..." value="{{ old('title') }}">

                        @error('title')
                            <div class="invalid-feedback"> {{$message}} </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control @error('content')is-invalid @enderror"  name="content" rows="5" placeholder="Enter Content...">  {{ old('content') }} </textarea>

                        @error('content')
                            <div class="invalid-feedback"> {{$message}} </div>
                        @enderror
                    </div>

                    <button class="btn btn-outline-primary">Submit</button>

                    <a href="{{ url('posts') }}" class ="btn btn-outline-success"> <i class="fa fa-arrow-circle-left"></i> Back </a>
                </form>
            </div>

            <div class="col-3">
            
            </div>
        </div>
    </div>
</body>
</html>