<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder\Function_;

class Comment extends Model
{
    use HasFactory;
    public function post(){ // we dont need to put 'post_id' because the method is already named post
       return $this->belongsTo(Post::class);
    }
    public function author(){ // we need to put user_id because author_id dont exist
       return $this->belongsTo(User::class, 'user_id');
    }


}
