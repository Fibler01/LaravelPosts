<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Posts Page";
        $posts = Post::paginate(4);
        return view('posts.post', ["title"=>$title, "posts"=>$posts]); /* passando o titulo para a view post */
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $flag = "new";
        $route = "/post/create";
        return view('posts.form', ['flag'=>$flag, 'route'=>$route]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $valid = $request->validate([ /* definindo regras para validar form */
            'title' => 'required|unique:posts|max:100', /* verificar se outras pessoas n vao poder criar post com o mesmo titulo */
            'post_content' => 'min:10'
        ]);
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->post_content,
            'user_id' => auth()->user()->id
        ]);

        return redirect('/post');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $post = Post::find($id);
        $title = "Visualizar post";
        return view('posts.single', ['title'=>$title, 'post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $route = "/post/update/$id";
        $flag = "modify";
        $post = Post::find($id);
        return view('posts.form', ['route'=>$route, 'flag'=>$flag, 'post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $valid = $request->validate([ /* definindo regras para validar form */
            'title' => 'required|max:100', /* verificar se outras pessoas n vao poder criar post com o mesmo titulo */
            'post_content' => 'min:10'
        ]);

        $post = Post::find($id);
        $post->title = $request->title;
        $post->content = $request->post_content;
        $post->update();

        return redirect('/post');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $post = Post::find($id);
        $post->delete();
        return redirect('/post');
    }
}
