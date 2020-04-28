<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'updating_user_id',
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function updating_user()
    {

        return $this->belongsTo(User::class);

    }

}

