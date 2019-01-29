<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';
    protected $fillable = [
        'name', 'parent', 'display_name', 'description'
    ];

    public function users()
    {
        return $this->belongsToMany(\App\User::class, 'permission_user', 'permission_id', 'user_id');
    }
}
