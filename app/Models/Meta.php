<?php

namespace App\Models;

use Eloquent as Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Meta extends Model implements TranslatableContract
{
    use Translatable;

    public $table           = 'metas';
    protected $primaryKey   = 'id';
    public $translatedAttributes =  ['title', 'description', 'keywords' ];
    public $fillable = ['status', 'page' ];

    protected $casts = [
        'id'            => 'integer',
        'page_id'       => 'integer',
        'title'         => 'string',
        'description'   => 'string',
        'keywords'      => 'string',
        'status'        => 'integer'
    ];

    public function scopeSorted($query, $type = 'asc')
    {
        return $query->orderBy('metas.id', $type);
    }

    /////////////////////////////////////////  Realtions ///////////////////////////////////////////////
    public function page()
    {
        return $this->belongsTo('App\Models\Page', 'page_id', 'id');
    }
}
