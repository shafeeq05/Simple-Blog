<?php

namespace App\Http\Controllers\TagsCategory;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagsCategory
{
    public function showTags(){
        $usertyp = request()->cookie('user');
        if($usertyp == 'loggedIn'){

            $tags= Tag::get();
            return view('Tags.tags')->with('data',$tags);
        }
        return redirect('/user/login');
    }

    public function getTag()
    {

        return view("Tags.addtags");


    }

    public function postTag($id=null)
    {
        $tag = request()->all();
        $tagpost = Tag::updateOrCreate(['id'=>$id],$tag);
        if($tagpost->id){
        //   return $tagpost;
        session()->flash('msg','Tag added');
        return redirect('/user/dashboard/get-tags');
        // ->with('success', 'This is a success alert!');
        }
        session()->flash('msg','Tag cannot added');
        return back();
    }

    // for Categories

    public function showCategory()
    {
        $usertyp = request()->cookie('user');
        if($usertyp == 'loggedIn'){
            $categories = Category::get();
            return  view('Category.category')->with('data',$categories);

        }
        return redirect('/user/login');
    }

    public function getCategory()
    {
        return view('Category.addcategory');
    }

    public function postCategory($id=null)
    {
        $postcategory = request()->all();
        $category = Category::updateOrCreate(['id'=>$id],$postcategory);
        if($category){
            session()->flash('msg','category added');
        return redirect('/user/dashboard/get-categories');
        }
        session()->flash('msg','cannot add category');
        return back();
    }
}
