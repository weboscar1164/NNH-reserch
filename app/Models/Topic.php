<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends Model
{
    use HasFactory;

    /**
     * 状態定義
     */
    use SoftDeletes;
    protected $detes = ['deleted_at'];
}