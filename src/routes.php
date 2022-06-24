<?php
use UgurAkcil\VoyagerBlog\VoyagerBlogController;

Route::get(
    '/voyager-blog',
    [VoyagerBlogController::class, 'index']
)->name('voyager-blog');
