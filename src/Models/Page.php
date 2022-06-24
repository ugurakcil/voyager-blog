<?php

namespace UgurAkcil\VoyagerBlog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Traits\Translatable;

class Page extends Model
{
    use Translatable;
    use SoftDeletes;

    protected $translatable = ['title', 'sub_title', 'excerpt', 'slug', 'body', 'meta_description', 'seo_title'];
    protected $dates        = ['created_at', 'updated_at', 'deleted_at'];

    public $searchable      = ['title', 'sub_title', 'excerpt', 'body', 'meta_description'];
    public $contentTypes    = ['draft', 'published', 'pending'];

    protected $guarded = [];

    public function save(array $options = [])
    {
        // If no author has been assigned, assign the current user's id as the author of the post
        if (!$this->author_id && Auth::user()) {
            $this->author_id = Auth::user()->getKey();
        }

        return parent::save();
    }

    public function scopeContentType($query, $contentTypeKey)
    {
        return $query->where('status', $contentTypeKey);
    }
}
