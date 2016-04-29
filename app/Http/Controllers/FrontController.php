<?php

namespace App\Http\Controllers;

use App\Post;
use App\Score;
use App\Score\ScoreService;
use App\Category;
use App\Http\Requests;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * @var int
     */
    private $paginate = 10;

    /**
     * @var int
     */
    private $average = 0;

    /**
     * @param ScoreService $score
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ScoreService $score)
    {
        $title = 'Accueil';

        $posts = Post::with('category','user','tags','picture')
            ->published()
            ->order()
            ->paginate($this->paginate);

        $best = $score->get();

        if(!is_null($best))
            $bestPost = Post::findorFail($best->id);
        else
            $bestPost = null;

        return view('front.index', compact('posts','title','bestPost'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $title = 'Article';

        $post = Post::findOrFail($id);

        return view('front.show', compact('post','title'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showPostByCategory($id)
    {
        $category = Category::findOrFail($id);

        $name = $category->title;

        $title = 'Articles de la catégorie : '.$name;

        $posts = $category->posts()->published()->order()->paginate($this->paginate);

        return view('front.showByCategory', compact('posts','name','title'));
    }

    /**
     * @param Request $request
     * @param ScoreService $score
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeScore(Request $request, ScoreService $score)
    {
        $this->validate($request, [
            'post_id' => 'integer',
            'score' => 'required|integer|between:0,20'
        ]);

        $postId = $request->input('post_id');

        $post = Post::findOrFail($postId);

        Score::create($request->all());

        $scores = $score->average($postId);

        if(count($scores) > 0)
        {
            foreach($scores as $score)
                $this->average += $score->score;

            $this->average = (number_format(round($this->average/count($scores)),0));

            $post->update(['score' => $this->average]);
        }
        else
        {
            $post->update(['score' => $request->input('score')]);
        }

        return redirect('article/'.$postId)->with('message','Votre vote a bien été pris en compte !');
    }
}
