<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $guarded = ['updated_at', 'created_at'];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
