<?php

namespace App;

// use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
 //   use Sluggable;

    protected $fillable = ['category_id', 'photo_id', 'title', 'body'];

    // public function sluggable(): array
    // {
    //     return [
    //         'slug' => [
    //             'source' => 'title'
    //         ]
    //     ];
    // }

    public function user(){

        return $this->belongsTo('App\User');
    }

    public function photo(){

        return $this->belongsTo('App\Photo');
    }

    public function category(){

        return $this->belongsTo('App\Category');
    }

    public function comments(){

        return $this->hasMany('App\Comment');
    }

    public function photoPlaceholder(){

        return "http://placehold.it/700x200";
    }
}
