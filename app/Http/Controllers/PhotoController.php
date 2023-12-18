<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\User;

class PhotoController extends Controller
{
    public function index(Request $request) {
        $photos = Photo::all();
        return response()->json($photos);
    }

    public function getImages(Request $request, User $user) {
        
    }

    public function store(Request $request) {
        $photos = new Photo();
        $photos->user_id = $request->input('user_id');
        $photos->album_id = $request->input('album_id');
        $photos->postal_code = $request->input('postal_code');
        $photos->image_url = $request->input('image_url');
        $photos->image_title = $request->input('image_title');
        $photos->tag_id = $request->input('tag_id');
        $photos->favorite_id = $request->input('favorite_id');
        $photos->address = $request->input('address');
        $photos->scene_text = $request->input('scene_text');
        $photos->save();
    }

    public function update(Request $request, Photo $photos) {
        $photos->image_url = $request->input('image_url');
        $photos->image_title = $request->input('image_title');
        $photos->tag_id = $request->input('tag_id');
        $photos->favorite_id = $request->input('favorite_id');
        $photos->address = $request->input('address');
        $photos->scene_text = $request->input('scene_text');
        $photos->save();
    }

    public function destroy(Photo $photos) {
        $photos->delete();
    }
}
