<?php


namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $fillable = [
        'title',
        'sub_title',
        'description',
        'slug',
        'status',
    ];
    
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

}
