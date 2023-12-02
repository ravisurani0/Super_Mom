<?php

namespace App;

namespace App\Model;

use App\Model\Pages;
use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{
    protected $fillable = [
        'title',
        'cms_key',
        'cms_value',
        'field_type',
        'description',
        'page_id',
        'status',
        'tags',
    ];

    public function Page()
    {
        return $this->belongsTo(Pages::class, 'page_id', 'id');
    }

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
