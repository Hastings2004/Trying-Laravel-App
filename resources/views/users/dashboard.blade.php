<x-layout>
    @auth
        <h1 class="text-4xl">Welcome {{auth() -> user() -> username}}</h1>
         <div>
            <div>
                @if (session('post'))
                    <x-message msg="{{ session('post') }}"/>
                @elseif (session('delete'))
                    <x-message msg="{{ session('delete') }}"/>
                @endif

            </div>
          
           
            <form action="{{route('posts.store')}}" method="post">
                @csrf
                <label for="">Title</label> <br>
                <input type="text" name="title"> <br>
                @error('title')
                    <p style="color: red;">{{$message}}</p>                    
                @enderror
                <label for="">Body</label> <br>
                <textarea name="body" id="" cols="30" rows="10"></textarea><br>
                @error('body')
                <p style="color: red;">{{$message}}</p>                    
                @enderror
                <button name="post"> Post</button>

            </form>
         </div>
         <div style="display:flex; flex-wrap: wrap;">
            @foreach ($posts as $post)
                <x-postCard :post="$post">

                    <form action="{{route('posts.destroy', $post)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <div style="display: flex;">
                            <a href="{{route('posts.edit', $post)}}" style="background-color: green; text-decoration:none; color:white; border:2px solid green; margin-left:70%; padding:5px; border-radius:9px">Update</a>
                    
                            <button style="background-color: red; color:white; border:2px solid red; margin-left:8%; padding:5px; border-radius:9px">Delete</button>
                    
                        </div>
                         </form>
                </x-postCard>
            @endforeach
        </div>
        <div style="width: 100px; height:10px;">
            {{ $posts -> links()}}
        </div>
    @endauth
    
</x-layout>