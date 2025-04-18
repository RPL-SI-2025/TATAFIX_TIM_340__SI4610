<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tukang extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'role_id',
        'photo'
    ];

    // Gunakan user_id sebagai key
    public function getRouteKeyName()
    {
        return 'user_id';
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'role_id');
    }
}
