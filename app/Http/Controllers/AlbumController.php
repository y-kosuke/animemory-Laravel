<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;

class AlbumController extends Controller
{
    public function index(Request $request) {
        $albums = Album::all();
    }

    public function store(Request $request) {
        $albums = new Album();
        $albums->user_id = $request->input('user_id');
        $albums->map_id = $request->input('map_id');
        $albums->title = $request->input('title');
        $albums->save();
    }

    public function update(Request $request, Album $albums) {
        $albums->user_id = $request->input('user_id');
        $albums->map_id = $request->input('map_id');
        $albums->title = $request->input('title');
        $albums->save();
    }

    public function destroy(Album $albums) {
        $albums->delete();
    }
}
