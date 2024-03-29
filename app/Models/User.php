<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Topic;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // リレーションシップ - likes
    public function likes()
    {
        return $this->belongsToMany(Topic::class, 'likes', 'user_id', 'topic_id')->withTimestamps();
    }

    // 現在のuserによってlikeされているか
    public function isLike($topicId)
    {
        return $this->likes()->where('topic_id', $topicId)->exists();
    }

    // is_likeがfalseならば現在のユーザーと選択されたtopicでlikeを作成する
    public function like($topicId)
    {
        if (!$this->isLike($topicId)) {
            $this->likes()->attach($topicId);
        }
    }

    public function unlike($topicId)
    {
        if ($this->isLike($topicId)) {
            $this->likes()->detach($topicId);
        }
    }

    // リレーションシップ - comments
    public function commnets()
    {
        return $this->belongsToMany(User::class, 'comments', 'user_id', 'topic_id')->withTimestamps();
    }

    // リレーションシップ - topics
    public function topics()
    {
        return $this->hasMany('App\Model\Topic', 'topic_id', 'id');
    }
}