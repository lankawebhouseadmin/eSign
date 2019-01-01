<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCloudTokens extends Model
{
    public $table = "user_cloud_tokens";

    protected $fillable = [
        'user_id',
        'type',
        'access_token',
        'is_enabled',
        'created_at',
        'updated_at'
    ];
}
