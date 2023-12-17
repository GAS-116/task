<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostService
{

    public function store($data)
    {
        try{
            Db::beginTransaction();
            Post::firstOrCreate($data);
            DB::commit();
        }
        catch (\Exception $exception){
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $post)
    {
        ///
    }
}
