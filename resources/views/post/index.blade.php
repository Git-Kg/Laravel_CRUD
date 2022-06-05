<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>
   <div class="container">
   
        <div class="row mt-5">

           <div class="col-2"> </div>

           <div class="col-8">
           <h1 class="text-center">Post List</h1>

           <a href="{{ route('posts.create') }}" class ="btn btn-primary mb-3"> <i class="fa fa-plus-circle"></i> Create New Post</a>
                        {{-- url('posts/create') --}}
           {{-- alert success style --}}
           @if(Session('successAlert'))
                <div class="alert alert-success alert-dismissable show fade"> 
                    <strong>{{ Session('successAlert') }}</strong>
                    <button class="close" data-dismiss="alert">&times;</button>
                </div>
           @endif

           @if(Session('delete'))
                <div class="alert alert-danger alert-dismissable show fade"> 
                    <strong>{{ Session('delete') }}</strong>
                    <button class="close" data-dismiss="alert">&times;</button>
                </div>
           @endif

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                       <?php $no = 1; ?>
                        @foreach($posts as $post)
                        <tr>
                            <td> <?php echo $no ?> </td>
                            <td> {{ $post->title }} </td>
                            <td> {{ $post->content }} </td>
                            <td> 
                                {{-- url('posts/' . $post->id )       --}}
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    {{-- url('posts/'. $post->id .'/edit') --}}
                                    <a href="{{ route('posts.edit', $post->id) }}">
                                        <button type="button" class="btn btn-outline-success btn-sm">
                                        <i class="fa fa-edit"></i> Edit </button>
                                   </a>

                                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are You Sure Delete ?')">
                                        <i class="fa fa-trash"></i> Delete </button>
                            </form>
                            </td>
                        </tr>
                        <?php $no++; ?>
                        @endforeach
                    </tbody>
                </table>

                {{-- Pagination --}}
                {{ $posts->links()}}
           </div>

           <div class="col-2"> </div>
        </div>
   </div>


   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
   
</body>
</html>