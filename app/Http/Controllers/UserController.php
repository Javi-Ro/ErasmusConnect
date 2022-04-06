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
        $newUser = User::find($user->id);
        $newUser->name = $request->name;
        $newUser->nickname = $request->nickname;
        $newUser->img_url = $request->img_url;
        $newUser->city_id = $request->city_id;
        $newUser->email = $request->email;
        $newUser->save();
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


    public function listFollowers(User $user)
    {
        return response()->json($user->friends()->get());
    }

    public function addFollower(User $user1, User $user2)
    {
        //$user1 = new User(['name' => 'root']);
        //$user1->save();
        //$user1->friends()->array_push($user1->friends(), $user2);
        $user1->friends()->attach($user2->id);
    }
}
