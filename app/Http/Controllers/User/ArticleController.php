<?php

namespace App\Http\Controllers\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ArticleController
{

   public function getArticleform(){
    $tags = Tag::get();
    $category = Category::get();
    $data = ['categories'=>$category,'tags'=>$tags];
    // return $data['tags'];
    return view('Articles.addarticle')->with('data',$data);
   }



   public  function postArticles($id=null)
   {

    $inputs = Request::all();

    $validator = Validator::make($inputs,
    [
        'title' => 'required',
        'description' => 'required',
        'category' => 'required',
        'tag' => 'required',
        // 'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max file size: 2MB

    ]);

    if($validator->fails()){
        return back()->with('errors',$validator->errors());
    }
    $input = request()->only(['title','description','category','tag','image']);

    if(request()->hasFile('image')){

        $extension = request('image')->extension();
        $imagename = 'userpic_'.time().'.'.$extension;
        request('image')->storeAs('public/images',$imagename);
        $input['image'] = $imagename;
        // return $input;
    }
    Article::updateOrCreate(['id'=>$id],$input);
    session()->flash('msg','Article Added');
        return redirect('/user/dashboard');
    // return redirect()->to('/user/dashboard');
   }


   public function showArticle()
   {
    $usertyp = request()->cookie('user');
    // dd($usertyp);
   if($usertyp == 'loggedIn'){
    $article = Article::get();
    //  dd($article);
    return view('User.dashboard')->with('data',$article);
   }else
   return redirect('/user/login');
   }

   public function getArticle($id)
   {
    $article = Article::find($id);
    $data = ['article'=>$article];
    // return $article;
    return view('Articles.showarticle')->with('data',$data);
   }

   public function editArticle($id)
   {
    $article = Article::find($id);

    return view('Articles.addarticle')->with('data',$article);
   }

   public function deleteArticle($id)
   {
    if($id){

    $article =  Article::find($id);
    if($article['image']){
        $filePath = storage_path().'/app/public/images/' . $article['image'];
        if(file_exists($filePath)){
            $filedeleted =unlink($filePath);
            if($filedeleted)
            {
                $article->delete();
                session()->flash('msg','deleted successfully');
               return redirect('/user/dashboard');
            }

        }else{
            session()->flash('msg','cannot delete');
               return redirect('/user/dashboard');
        }
    }
    else{
        $article->delete();
        session()->flash('msg','deleted');
        return redirect('/user/dashboard');
    }

    }

   }

}
