<?php

namespace App\Models;

use App\Http\Controllers\PostController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable= [
      'post_id',
      'author',
      'email',
      'is_active',
      'body'
    ];

    public function post(){

        return $this->belongsTo(Post::class);

    }

}
