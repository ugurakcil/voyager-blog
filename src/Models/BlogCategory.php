<?php

namespace UgurAkcil\VoyagerBlog\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;
use UgurAkcil\VoyagerBooster\Facades\VoyagerRecursiveCategories;

class BlogCategory extends Model
{
    use Translatable;

    protected $translatable = ['name', 'slug'];

    public $searchable = ['id', 'name'];

    public function parentId()
    {
        return $this->belongsTo(self::class);
    }

    public function blogCategoryIdList()
    {
        return VoyagerRecursiveCategories::generate($this::get());
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

}
