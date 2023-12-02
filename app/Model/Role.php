<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Model\User;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'status',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsToMany(User::class, 'role', 'id');
    }
}
