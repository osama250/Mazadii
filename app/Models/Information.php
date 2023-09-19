<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Translatable;

class Information extends Model
{
    use SoftDeletes , Translatable;
    public $table    = 'informations';
    protected $dates = ['deleted_at'];
    public $translatedAttributes =  ['name', 'value'];
    public $fillable   = ['status' ];
    public $timestamps = false;

    protected $casts = [
        'id'        => 'integer',
        'name'      => 'string',
        'value'     => 'string',
        'status'    => 'integer'
    ];

    public static function rules()
    {
        $languages = array_keys(config('langs'));

        foreach ($languages as $language) {
            $rules[$language . '.name'] = 'required|string|min:3|max:191';
            $rules[$language . '.value'] = 'required|string';
        }

        $rules['status'] = 'required|in:0,1';

        return $rules;
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
