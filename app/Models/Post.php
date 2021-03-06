<?php

namespace App\Models;

use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
//    protected $guarded = [];
      protected $fillable = [
          'user_id',
          'category_id',
          'title',
          'post_image',
          'body',
      ];

    public function user(){

        return $this->belongsTo(User::class);
    }

//    public function setPostImageAttribute($value){
//
//        $this->attributes['post_image'] = asset($value);
//
//    }
//
//    public function getPostImageAttribute($value){
//
//        return asset($value);
//
//    }
    public function getPostImageAttribute($value) {
    if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
    return $value;
    }
    return asset('storage/' . $value);
    }

    public function comments(){

        return $this->hasMany(Comment::class);

    }

    public function category(){

        return $this->belongsTo(Category::class);

    }
}
