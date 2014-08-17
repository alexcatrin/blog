<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Category extends Eloquent  {



	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
    public  $timestamps = false;

    public function posts(){
         return $this->belongsToMany('Post','category_posts','category_id','post_id');
     }

}
