<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request) {
        $users = User::all();
        return response()->json($users);
    }

    public function store(Request $request) {
        $users = new User();
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->password = $request->input('password');
        $users->birthday = $request->input('birthday');
        $users->gender = $request->input('gender');
        $users->anime_like_text = $request->input('anime_like_text');
        $users->user_image = $request->input('user_image');
        $users->save();
    }

    public function update(Request $request, User $users) {
        $users->name = $request->input('name');
        $users->password = $request->input('password');
        $users->anime_like_text = $request->input('anime_like_text');
        $users->user_image = $request->input('user_image');
        $users->save();
    }

    public function destroy(User $users) {
        $users->delete();
    }
}
