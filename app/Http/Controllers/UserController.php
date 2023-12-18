<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request) {
        //パスに指定したものをとってくる処理を書く
        $users = User::all();
        return response()->json($users);
    }

    //メールとパスワードを受け取ってそれが一致するかしないかの処理関数
    public function getUser(Request $request) {
        //リクエストにメールとパスワードがあるからそれを持ってくる(フォームから受け取るA)
        // $users = new User();
        // $users->email = $request->input('email');
        // $users->password = $request->input('password');
        //情報があったら合致(A=B)(ユーザーテーブルにあるものB)        
        $result = User::where('email', '=', $request->input('email'))
        ->where('password', '=', $request->input('password'))
        ->first();
        //情報を返す(なかったら返さない)
        if(is_null($result)) {
            return response()->json([
                'code' => 400,
                'message' => 'ユーザーが存在しません。',
            ]);
        } else {
            return response()->json($result);
        }
    }

    public function store(Request $request) {
        $users = new User();
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->password = $request->input('password');
        $users->birthday = $request->input('birthday');
        $users->gender = $request->input('gender');
        // $users->anime_like_text = $request->input('anime_like_text');
        // $users->user_image = $request->input('user_image');
        $users->save();
    }

    public function update(Request $request, User $users) {
        $users->name = $request->input('name');
        $users->password = $request->input('password');
        // $users->anime_like_text = $request->input('anime_like_text');
        // $users->user_image = $request->input('user_image');
        $users->save();
    }

    public function destroy(User $users) {
        $users->delete();
    }
}
