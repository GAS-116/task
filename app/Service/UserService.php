<?php

namespace App\Service;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService
{

    public function store($data)
    {
        try{
            Db::beginTransaction();
            $data['password'] = Hash::make($data['password']);
            User::firstOrCreate([ 'email' => $data['email']], $data);
            DB::commit();
        }
        catch (\Exception $exception){
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $user)
    {
        try{
            Db::beginTransaction();
            $user->update($data);
            DB::commit();
        }
        catch (\Exception $exception){
            DB::rollBack();
            abort(500);
        }
    }
}
