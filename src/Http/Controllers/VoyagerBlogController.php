<?php
namespace UgurAkcil\VoyagerBlog\Http\Controllers;

use App\Models\VoyagerBlog\BlogCategory;
use App\Models\VoyagerBlog\BlogPost;
use App\Models\VoyagerBlog\Tag;
use Illuminate\Http\Request;

class VoyagerBlogController extends VoyagerBaseController
{
	public function index()
	{
        $this->data['blogPostsPaginator'] = BlogPost::select('id', 'title', 'image', 'slug', 'blog_category_id', 'excerpt', 'created_at')
            ->ordered()
            ->active()
            ->paginate(10);
        $this->data['blogPosts'] = $this->data['blogPostsPaginator']->translate(app()->getLocale());

        return view('voger::blog.pages.home', $this->data);
    }

    public function category($slug){
        $this->data['currentCategory'] = BlogCategory::select('id','name', 'slug', 'parent_id')
            ->whereTranslation('slug', $slug)->first()->translate(app()->getLocale());

        $this->data['blogPostsPaginator'] = BlogPost::select('id', 'title', 'image', 'slug', 'blog_category_id', 'excerpt', 'created_at')
            ->ordered()
            ->whereBlogCategoryId($this->data['currentCategory']->id)
            ->active()
            ->paginate(8);
        $this->data['blogPosts'] = $this->data['blogPostsPaginator']->translate(app()->getLocale());

        return view('voger::blog.pages.category', $this->data);
    }

    public function tag($slug){
        $currentTag = Tag::select('id','name', 'slug')
            ->whereTranslation('slug', $slug)->first();

        $this->data['currentTag'] = $currentTag->translate(app()->getLocale());

        $this->data['tagPostsPaginator'] = $currentTag->posts()->paginate(8);
        $this->data['tagPosts'] = $this->data['tagPostsPaginator']->translate(app()->getLocale());

        return view('voger::blog.pages.tag', $this->data);
    }

    public function search(Request $req) {
        $searchKey = $req->input('search');

        if(mb_strlen($searchKey) > 100 || mb_strlen($searchKey) < 3)
            abort(400);

        $this->data['postsPaginator'] = BlogPost::select('id', 'title', 'image', 'slug', 'excerpt', 'created_at')
            ->ordered()
            ->active()
            ->whereTranslation('title', 'LIKE', '%'. $searchKey .'%')
            ->orWhere(function($query) use ($searchKey){
                $query->whereTranslation('excerpt', 'LIKE', '%'. $searchKey .'%');
            })
            ->orWhere(function($query) use ($searchKey){
                $query->whereTranslation('body', 'LIKE', '%'. $searchKey .'%');
            })
            ->paginate(8);


        $this->data['posts'] = $this->data['postsPaginator']->translate(app()->getLocale());

        return view('voger::blog.pages.search', $this->data);
    }

    public function post($slug)
    {
        if(mb_strlen($slug) > 100 || mb_strlen($slug) < 3)
            abort(400);

        $post = BlogPost::whereTranslation('slug', $slug)->first();

        if(empty($post))
            abort(404);

        $this->data['page'] = $post->translate(app()->getLocale());

        return view('voger::blog.pages.post', $this->data);
    }
}
