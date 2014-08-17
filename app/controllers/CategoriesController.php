<?php

class CategoriesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        $categories=Category::all();
        $categoriesHelper=new ItemsHelper($categories);

        return View::make('smart/categories.index',['categoriesHelper'=>$categoriesHelper,'categories'=>$categories]);
	}

    public  function show($category_id){
        $category=Category::find($category_id);

        if(Request::is('category/update/*')){
            return View::make('smart/categories.update')->withCategory($category);
        }
        else if(Request::is('category/add/*')){
            return View::make('smart/categories.show')->withCategory($category);
        }

    }

    public function update($category_id){

        $category=Category::find($category_id);
        $category->name=Input::get('name');

        $category->save();
        return Redirect::to('categories');
    }

    public function store($category_id = null){

        if(is_null($category_id)){
            //adding a new category
            $category= new Category();
            $category->name=Input::get('category_name');

            $category->save();
        }else{
            //adding a subcategory to a existing category
            $parent_category_id=$category_id;
            $child_category_name=Input::get('child_category_name');

            $category=new Category();
            $category->name=$child_category_name;
            $category->parent_id=$parent_category_id;

            $category->save();
        }
        Return Redirect::to('categories');
    }

    public  function delete($category_id){
        $category=Category::find($category_id);
        $category->delete();



        return Redirect::to('categories');
    }

}
