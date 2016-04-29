<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'post_id','score'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function posts()
    {
        return $this->belongsTo('App\Post');
    }
}
