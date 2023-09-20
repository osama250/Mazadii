<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Paragraph extends Model
{
    use SoftDeletes , Translatable;

    public $table    = 'paragraphs';
    protected $dates = ['deleted_at'];
    public $fillable = [ 'page_id' ];
    public $translatedAttributes =  [ 'text' ];
    public $timestamps = false;

    protected $casts = [
        'id'        => 'integer',
        'page_id'   => 'integer'
    ];

    public static function rules()
    {
        $languages = array_keys(config('langs'));
        foreach ($languages as $language) {
            $rules[$language . '.text'] = 'required|string';
        }

        return $rules;
    }

    // Relations
    public function page()
    {
        return $this->belongsTo('App\Models\Page', 'page_id', 'id');
    }

}
