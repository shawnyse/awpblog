<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'comment',
        'likes',
        'movie',
        'score',
    ];

    public function upVoteAndSave()
    {
        $this->likes += 1;
        $this->update();
    }

    public function downVoteAndSave()
    {
        $this->likes -= 1;
        $this->update();
    }

    public function user ()
    {
        return $this->belongsTo(User::class);
    }
}

