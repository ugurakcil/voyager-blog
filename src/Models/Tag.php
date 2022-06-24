<?php

namespace UgurAkcil\VoyagerBlog\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Tag extends Model
{
    use Translatable;
    protected $translatable = ['name', 'slug'];
    protected $dates        = ['created_at', 'updated_at'];

    public $searchable      = ['id', 'name', 'slug'];

    public function posts()
    {
        return $this->belongsToMany('App\Models\VoyagerBlog\BlogPost', 'blog_posts_tags');
    }
}
