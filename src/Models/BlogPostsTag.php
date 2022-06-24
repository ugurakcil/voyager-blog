<?php

namespace UgurAkcil\VoyagerBlog\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPostsTag extends Model
{
    protected $fillable     = ['blog_post_id', 'tag_id'];
}
