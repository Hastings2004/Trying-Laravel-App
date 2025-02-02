<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Storage;
use Pest\Plugins\Only;

class PostController extends Controller implements HasMiddleware
{
    public static function middleware(): array{
        return [
            //new Middleware('auth', only: ['store', 'edit','update']),
            new Middleware('auth', except: ['index', 'show']),
        ];
        
    }
    /**
     * 
     * Display a listing of the resource.
     */

    public function index()
    {
        $post = Post::latest()->paginate(10);
        return view('posts.index', ['posts' => $post]);
    }

    /**
     * Show the form for creating a new resource.
     *
      * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $request-> validate([
            'title'=> ['required','max:255'],
            'body'=> ['required'],
            'image'=> ['required','file', 'max:10000', 'mimes:png,webp,jpg'],
        ]);

        $path = null;
        if ($request -> hasFile('image')) {

            $path = Storage::disk('public') -> put('posts_image', $request->image);
         
        }
       

        Auth::user()->posts()->create([
            'title'=> $request -> title,
            'body'=> $request -> body,
            'image'=> $path,
        ]);
        
        return back() -> with('post', "You have posted");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post) 
    {
        return view('posts.show', ['post'=> $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
        Gate::authorize('modify', $post);
        return view('posts.edit', ['post' => $post]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
        Gate::authorize('modify', $post);
        
        $field = $request-> validate([
            'title'=> ['required','max:255'],
            'body'=> ['required'],
            'image'=> ['required','file', 'max:10000', 'mimes:png,webp,jpg'],
        ]);

        $path = $post -> image;
        if ($request -> hasFile('image')) {
            if($post -> image){
                Storage::disk('public')->delete($post -> image);
            }
            $path = Storage::disk() -> put('posts_image', $request->image);
         
        }
       


        $post->update([
            'title'=> $request -> title,
            'body'=> $request -> body,
            'image'=> $path,
        ]);
        
        return redirect()-> route('dashboard') -> with('update', "You have update your post");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
        Gate::authorize('modify', $post);

        if($post -> image){
            Storage::disk('public')->delete($post -> image);
        }
        $post->delete();

        return back() -> with('delete','successfully deleted');
    }
}
