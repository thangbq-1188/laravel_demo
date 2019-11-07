<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Request;

class PostsController extends Controller
{
    public function __construct() {
        $this->middleware('can:create,App\Models\Post', ['only' => ['store', 'create']]);
        $this->middleware('can:update,post', ['only' => ['edit', 'update']]);
        $this->middleware('can:delete,post', ['only' => 'destroy']);
    }

    public function index()
    {
        switch (true) {
            case Request::has('user_id'):
                $posts = Post::byUser(Request::input('user_id'));
                break;
            case Request::has('category_id'):
                $posts = Post::byCategory(Request::input('category_id'));
                break;
            default:
                $posts = Post::query();
                break;
        }

        $posts = $posts->orderBy('created_at', 'desc')->paginate(5);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categoriesDropdown = Category::pluck('name', 'id');
        return view('posts.create', compact('categoriesDropdown'));
    }

    public function store(StorePostRequest $request)
    {
        $post = Post::make($request->all());
        $post->user_id = auth()->user()->id;

        if($post->save()){
            session()->flash('alert-success', 'Post created successfully');
            return redirect()->route('posts.index', ['user_id' => auth()->user()->id]);
        } else {
            session()->flash('alert-danger', 'Unable to create post. Please try again');
            return back()->withInput();
        }
    }

    public function show(Post $post)
    {
        return view('posts.show')->with('post', $post);
    }

    public function edit(Post $post)
    {
        $categoriesDropdown = Category::pluck('name', 'id');
        return view('posts.edit', compact('post'))
                ->with('categoriesDropdown', $categoriesDropdown);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        if ($post->update($request->all())) {
            session()->flash('alert-success', 'Post updated successfully');
            return redirect()->route('posts.index', ['user_id' => auth()->user()->id]);
        } else {
            session()->flash('alert-danger', 'Unable to update post. Please try again');
            return back()->withInput();
        }
    }

    public function destroy(Post $post)
    {
        if ($post->delete()) {
            session()->flash('alert-success', 'Post deleted successfully');
        } else {
            session()->flash('alert-danger', 'Unable to delete post. Please try again');
        }
        return back();
    }
}
