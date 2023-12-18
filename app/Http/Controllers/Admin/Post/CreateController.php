<?php

namespace App\Http\Controllers\Admin\Post;

class CreateController extends BaseController
{
    public function __invoke()
    {
        return view('admin.posts.create');
    }
}
