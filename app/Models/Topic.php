<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Topic extends Model
{
    use HasFactory;

    /**
     * 状態定義
     */
    use SoftDeletes;
    protected $detes = ['deleted_at'];

    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes', 'user_id', 'topic_id')->withTimestamps();
    }
}