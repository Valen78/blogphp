<?php
namespace App\Score;

use App\Score;
use Illuminate\Support\Facades\DB;

class ScoreService
{
    /**
     * @var Score
     */
    protected $score;

    /**
     * ScoreService constructor.
     * @param Score $score
     */
    public function __construct(Score $score)
    {
        $this->score = $score;
    }

    /**
     * @return mixed
     */
    public function get(){
        return DB::table('posts')->orderBy('score','desc')->first();
    }

    /**
     * @param $postId
     * @return mixed
     */
    public function average($postId)
    {
        return $this->score->where('post_id','=',$postId)->get();
    }
}