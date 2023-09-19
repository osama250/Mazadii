<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Page extends Model
{
    use SoftDeletes ,  Translatable;
    public $table    = 'pages';
    protected $dates = ['deleted_at'];
    public $translatedAttributes =  [ 'name', 'content', 'slug' ];
    public $fillable = [ 'active', 'in_navbar', 'slug',  'in_footer' ];

    protected $casts = [
        'id'        => 'integer',
        'active'    => 'string',
        'in_navbar' => 'string',
        'in_footer' => 'string'
    ];



    public static function rules()
    {
        $languages = array_keys(config('langs'));
        foreach ($languages as $language) {
            $rules[$language . '.name'] = 'required|string|min:3|max:191';
            $rules[$language . '.content'] = 'required|min:3';
        }
        // $rules['active'] = 'required|in:yes,no';
        // $rules['in_navbar'] = 'required|in:yes,no';
        // $rules['in_footer'] = 'required|in:yes,no';

        return $rules;
    }
    ///////////////////////////////////////  Realtions ///////////////////////////////////////
    public function metas()
    {
        return $this->hasOne('App\Models\Meta', 'page_id', 'id');
    }

    public function paragraph()
    {
        return $this->hasMany('App\Models\Paragraph', 'page_id', 'id');
    }

    public function images()
    {
        return $this->hasMany('App\Models\Images', 'page_id', 'id');
    }
}
