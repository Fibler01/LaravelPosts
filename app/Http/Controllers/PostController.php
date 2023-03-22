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
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
