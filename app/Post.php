<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'title','content','status','score','published_at','category_id','user_id'
    ];

    /**
     * @var array
     */
    protected $dates = ['published_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function picture()
    {
        return $this->hasOne('App\Picture');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function score()
    {
        return $this->hasMany('App\Score');
    }

    /**
     * @param $id
     * @return bool
     */
    public function hasCategory($id)
    {
        if($this->category_id == $id) return true;

        return false;
    }

    /**
     * @param $id
     * @return bool
     */
    public function hasTag($id)
    {
        if(is_null($this->tags)) return false;

        foreach($this->tags as $tag)
        {
            if($tag->id === $id) return true;
        }

        return false;
    }

    /**
     * @param $value
     */
    public function setCategorieIdAttribute($value)
    {
        $this->attributes['category_id'] = ($value==0)?null:$value;
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopePublished($query)
    {
        return $query->where('status','=','published');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeOrder($query)
    {
        return $query->orderBy('published_at','desc');
    }
}
