@props(['post', 'full' => false])

    <div style="background-color:aliceblue;width:43%; border-radius:10px; margin:20px;padding:20px;">
        <h2>{{ $post-> title }}</h2>
        <div>
            <span>Posted {{ $post -> created_at -> diffForHumans() }} by</span>
            <a href="{{route('posts.users', $post -> user)}}" style="color: blue; text-decoration:none;">{{$post -> user -> username}}</a>
        </div>
        @if ($full)
            <div>
                <span>
                   {{ $post-> body }}
                </span>
                
            </div>
        @else
            <div>
                <span>
                    {{ Str::words($post-> body , 15)}}
                </span>
                <a href="{{route('posts.show', $post)}}" style="color: blue; text-decoration:none;">Read More</a>
            </div>
        @endif
        <div>
            {{$slot}}
        </div>
    </div>
                
    

