<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Post extends Eloquent  {



	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
    protected $fillable = array('categories_id','title','body','user');

     public function categories(){
         return $this->belongsToMany('Category','category_posts','post_id','category_id');
     }

     public function comments(){
         return $this->hasMany('Comment');
     }

}
