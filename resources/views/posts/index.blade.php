<x-layout>
    <h1 style="margin: 20px;">Latest Posts</h1>

        <div style="display:flex; flex-wrap: wrap;">
        @foreach ($posts as $post)
            <x-postCard :post="$post"/>
        @endforeach
    </div>
    <div style="width: 100px; height:10px;">
        {{ $posts -> links()}}
    </div>
    
</x-layout>