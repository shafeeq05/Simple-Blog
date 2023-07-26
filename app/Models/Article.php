<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['title',
    'description',
    'category',
    'tag',
    'image'];

    protected $appends = ['tags','categories','tag_name','cate_name'];

    public function getTagsAttribute()
    {
     return Tag::get();
    }
    public function getCategoriesAttribute()
    {
     return Category::get();
    }
    public function getTagNameAttribute()
    {
        return !empty($this->tag)?
        Tag::find($this->tag)->name :'';

    }
    public function getCateNameAttribute()
    {
        return !empty($this->category)?
        Category::find($this->category)->name :'';

    }

    // protected $appends = ['image_path'];
    // public function getImagePathAttribute()
    // {

    //     return URL::to('/').'/images/public/images/'.$this->image;
    // }

}
