<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected$fillable = [
        'postTitle',
        'postImage',
        'postContent',
        'postTags',
        'postCategoryId',
        'authorId'
    ]; //now I can use shortcut on PostController store function
}
