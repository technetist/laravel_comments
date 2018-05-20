<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'content', 'user_id',
    ];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
