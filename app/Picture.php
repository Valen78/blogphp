<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name','uri','post_id','mime','size'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function posts()
    {
        return $this->hasOne('App\Post');
    }
}
