<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use Attribute;

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

    public function commnets()
    {
        return $this->belongsToMany(User::class, 'comments', 'user_id', 'topic_id')->withTimestamps();
    }



    /*
    * 状態定義
    */
    const PUBLISHED = [
        0 => ['label' => '非公開', 'class' => 'bg-danger'],
        1 => ['label' => '公開', 'class' => 'bg-primary']
    ];

    /*
    *@return string
    */
    public function getPublishedLabelAttribute()
    {
        $published = $this->attributes['published'];

        if (!isset(self::PUBLISHED[$published])) {
            return '';
        }

        return self::PUBLISHED[$published]['label'];
    }

    public function getPublishedClassAttribute()
    {
        $published = $this->attributes['published'];

        if (!isset(self::PUBLISHED[$published])) {
            return '';
        }

        return self::PUBLISHED[$published]['class'];
    }

    /*
    * リレーションシップ - usersテーブル
    */
    public function owner()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id', 'users');
    }
}