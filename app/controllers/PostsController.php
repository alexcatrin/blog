<?php

class PostsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        $posts = Post::paginate(5);
        $categories = Category::all();
        return View::make('smart/posts.index',['posts'=>$posts]);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
        $categories_id=Input::get('category');

        $new_post=array(
            'title'         => Input::get('title'),
            'body'          => Input::get('body'),
            'user'          => Input::get('user'),
        );
        $post = new Post($new_post);
        $post -> save();

        $last_post_id=$post->id;

        foreach($categories_id as $selected_id)
        {

            $category_post= new CategoryPost;
            $category_post->category_id=$selected_id;
            $category_post->post_id=$last_post_id;

            $category_post->save();
        }

        return Redirect::to('posts');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($post_id)
	{
		//
        $post=Post::whereId($post_id)->first();
        return View::make('smart/posts.show')->with('post',$post);

	}

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($post_id)
    {
        //
        $category_ids=Input::get('category');

        $post= Post::find($post_id);
        $post->categories()->sync($category_ids);

        $post->title=Input::get('title');
        $post->body=Input::get('body');
        $post->user=Input::get('user');
        $post->save();

        return Redirect::to('/');
    }



}
