<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class PageTranslation extends Model
{
    use Sluggable;
    protected $table      = 'page_translations';
    protected $primaryKey = 'trans_id';
    protected $fillable   = ['name', 'content', 'slug'];
    public $timestamps    = false;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
