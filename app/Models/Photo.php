<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected $table = 'photos';
    protected $fillable = [
        'user_id', 'album_id', 'image_url', 'image_title', 'tag_id', 'favorite_date', 'address', 'scene_text', 'created_at', 'update_at'];
}
