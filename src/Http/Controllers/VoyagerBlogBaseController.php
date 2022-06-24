<?php
namespace UgurAkcil\VoyagerBlog\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\VoyagerBlog\BlogCategory;
use App\Models\VoyagerBlog\BlogPost;
use App\Models\VoyagerBlog\Tag;

class VoyagerBlogBaseController extends Controller
{
    protected $data = [];

    public function __construct()
    {
        $this->data['blogCategories'] = BlogCategory::select('id','name','slug','parent_id')
            ->get()->translate(app()->getLocale());

        $this->data['blogTags'] = Tag::select('id', 'name', 'slug')->orderBy('id','desc')
            ->get()->translate(app()->getLocale());

        $this->data['blogPopulars'] = BlogPost::select('id','title', 'image', 'slug', 'blog_category_id', 'created_at')
            ->active()->popularWeek()->limit(9)->get()->translate(app()->getLocale());
	}
}
