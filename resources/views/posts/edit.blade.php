<x-layout>
    <div>
        <div>
            <h2>Update your post</h2>
        </div
      
        >
        <form action="{{route('posts.update', $post)}}" method="post">
            @csrf
            @method('PUT')
            <label for="">Title</label> <br>
            <input type="text" name="title" value="{{$post -> title}}"> <br>
            @error('title')
                <p style="color: red;">{{$message}}</p>                    
            @enderror
            <label for="">Body</label> <br>
            <textarea name="body" id="" value="">{{$post -> body}}</textarea><br>
            @error('body')
            <p style="color: red;">{{$message}}</p>                    
            @enderror
            <button> Update</button>
    
        </form>
    

    </div>

</x-layout>