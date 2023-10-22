<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = [
        'name', 'email', 'password', 'birthday', 'gender', 'anime_like_text', 'user_image', 'created_at', 'update_at'];
}
