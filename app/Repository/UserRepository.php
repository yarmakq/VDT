<?php


namespace App\Repository;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class UserRepository
{
    public function userRole(User $user)
    {
        $roles = DB::table('users_roles')
            ->where('user_id', Auth::user()->id)->first();

        $role = DB::table('roles')
            ->where('id', $roles->role_id)->first();

        return $role->title;
    }
}
