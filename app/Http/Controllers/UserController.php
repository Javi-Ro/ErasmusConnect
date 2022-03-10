<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function get(User $user) {
        return response()->json(['user' => $user]);
    }

    public function create(Request $data) {
        $user = User::create(['name' => $data->name,
                              'nickname' => $data->nickname,
                              'email' => $data->email,
                              'city_id' => $data->city,
                              'password' => password_hash($data->password, PASSWORD_BCRYPT)]);
                              
        return response()->json(['success' => true, 'user' => $user]);
    }
}
