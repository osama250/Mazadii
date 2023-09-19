<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class FaqCategory extends Model
{
    use Translatable, SoftDeletes;

    public $table    = 'faq_categories';
    protected $dates = ['deleted_at'];
    public $translatedAttributes =  ['name'];
    public $fillable = ['name' ];

    protected $casts = [
        'id'   => 'integer',
        'name' => 'integer'
    ];

    public static function rules()
    {
        $languages = array_keys(config('langs'));
        foreach ($languages as $language) {
            $rules[$language . '.name'] = 'required|string|min:3|max:191';
        }
        return $rules;
    }
}
