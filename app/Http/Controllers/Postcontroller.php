<?php

namespace App\Http\Controllers;

use Auth;
use App\Tag;
use App\Post;
use App\Picture;
use App\Category;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\File;

class Postcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category','user','tags')
            ->order()
            ->paginate(10);

        return view('front.admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        $tags = Tag::all();

        $userId = Auth::user()->id;

        return view('front.admin.post.create', compact('categories', 'tags', 'userId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = Post::create($request->all());

        if(!empty($request->input('tag_id')))
            $post->tags()->attach($request->input('tag_id'));

        if(!empty($request->file('picture')))
            $this->upload($request->file('picture'),$request->input('name'),$post->id);

        return redirect('post')->with('message','Article ajouté !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        $categories = Category::all();

        $tags = Tag::all();

        $userId = Auth::user()->id;

        return view('front.admin.post.edit',compact('post', 'categories', 'tags', 'userId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $post->update($request->all());

        $title = $post->title;

        if(!empty($request->input('tag_id')))
            $post->tags()->sync($request->input('tag_id'));
        else
            $post->tags()->sync([]);

        if(!empty($request->input('deleteImg')))
            $this->deletePicture($post);

        if(!empty($request->file('picture')))
        {
            $this->deletePicture($post);
            $this->upload($request->file('picture'),$request->input('name'),$post->id);
        }

        return redirect('post')->with(['message' => sprintf('Article %s bien mis à jour !!', $title)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $title = $post->title;

        $this->deletePicture($post);

        $post->delete();

        return redirect('post')->with(['message' => sprintf('Article %s supprimé !', $title)]);
    }

    /**
     * @param $im
     * @param $name
     * @param $postId
     * @return bool
     */
    private function upload($im,$name,$postId)
    {
        $ext = $im->getClientOriginalExtension(); //extension du ficher

        $uri = str_random(50).'.'.$ext;

        Picture::create([
            'name' => $name,
            'uri' => $uri,
            'size' => $im->getSize(),
            'mime' => $im->getClientMimeType(),
            'post_id' => $postId
        ]);

        $im->move(env('UPLOAD_PICTURES','uploads'), $uri);

        return true;
    }

    /**
     * @param Post $post
     * @return bool
     */
    private function deletePicture(Post $post)
    {
        if(!is_null($post->picture))
        {
            $fileName = public_path('uploads') . DIRECTORY_SEPARATOR . $post->picture->uri;

            if (File::exists($fileName))
                File::delete($fileName);

            $post->picture->delete();

            return true;
        }
        return false;
    }
}
