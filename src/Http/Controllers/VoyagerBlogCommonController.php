<?php

namespace UgurAkcil\VoyagerBlog\Http\Controllers;

use Illuminate\Support\Facades\Config;

class VoyagerBlogCommonController extends VogerBaseController
{
    public function setLocale($locale){
        if(!array_key_exists($locale, Config::get('app.available_locales'))){
            return false;
        }

        session(['locale' => $locale]);
        return redirect(route('voger.blog.home'));
    }
}
