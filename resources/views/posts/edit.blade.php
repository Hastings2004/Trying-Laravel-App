<x-layout>
    <div>
        <div>
            <h2>Update your post</h2>
        </div
      
        >
        <form action="{{route('posts.update', $post)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="">Title</label> <br>
            <input type="text" name="title" value="{{$post -> title}}"> <br>
            @error('title')
                <p style="color: red;">{{$message}}</p>                    
            @enderror
            <label for="">Body</label> <br>
            <textarea name="body" id="" cols="30" rows="10">{{$post -> body}}</textarea><br>
            @error('body')
            <p style="color: red;">{{$message}}</p>                    
            @enderror
            <div>

                <img src="{{asset('storage/'. $post -> image)}}" alt="" style="width: 200px; width: 200px">
            
            </div>
            <label for="image">Cover Photo</label> <br>
                    <input type="file" name="image" id="image"> <br>
                    @error('image')
                    <p style="color: red;">{{$message}}</p>                    
                    @enderror
            <button> Update</button>
    
        </form>
    </div>

</x-layout>