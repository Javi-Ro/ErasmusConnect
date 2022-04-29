<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserController extends Controller
{
    public function get(User $user)
    {
        return response()->json(['user' => $user]);
    }

    public function getUsers()
    {
        $users = User::all();
        return response()->json(['user' => $users]);
    }

    public function create(Request $data)
    {
        $user = User::create([
            'name' => $data->name,
            'nickname' => $data->nickname,
            'email' => $data->email,
            'city_id' => $data->city,
            'password' => password_hash($data->password, PASSWORD_BCRYPT)
        ]);

        return response()->json(['success' => true, 'user' => $user]);
    }

    public function delete(User $user)
    {

        if (User::whereId($user->id)->count()) {
            $user->delete();
            return response()->json(['success' => true, 'user' => $user]);
        }

        return response()->json(['success' => false]);
    }



    public function update(Request $request, User $user)
    {

        if ($request->filled('name')) {
            $user->name = $request->name;
        }
        if ($request->filled('nickname')) {
            $user->nickname = $request->nickname;
        }
        if ($request->filled('img_url')) {
            $user->img_url = $request->img_url;
        }
        if ($request->filled('city_id')) {
            $user->city_id = $request->city_id;
        }
        if ($request->filled('email')) {
            $user->email = $request->email;
        }

        $user->save();
    }

    public function auth()
    {
        return response()->json(["auth" => Auth::check(), "user" => Auth::user()]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->json([], 204);
    }

    public function addFollower(User $user1, User $user2)
    {
        $user2->followers()->attach($user1->id);
    }

    public function deleteFollower(User $user1, User $user2)
    {
        $user2->followers()->detach($user1->id);
    }


    public function siguiendo(User $user1, User $user2)
    {
        for ($i = 0; $i < $user1->following()->count(); $i++) {
            if ($user1->following[$i]->id == $user2->id) {
                return response(true);
            }
        }
    }
}
