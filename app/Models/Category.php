<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Astrotomic\Translatable\Translatable;

use App\Helpers\ImageUploaderTrait;

class Category extends Model
{
    use SoftDeletes, Translatable, ImageUploaderTrait;

    public $table    = 'categories';
    protected $dates = ['deleted_at'];
    public $translatedAttributes =  ['name'];

    public $fillable = [
        // 'parent_id',
        'photo',
        'status'
    ];


    protected $casts = [
        'id'     => 'integer',
        'name'   => 'string',
        'photo'  => 'string',
        'status' => 'integer'
    ];

    public static function rules()
    {
        $languages = array_keys(config('langs'));

        foreach ($languages as $language) {
            $rules[$language . '.name'] = 'required|string|min:3|max:191';
        }

        $rules['status'] = 'required|in:0,1';
        $rules['photo'] = 'required|image|mimes:jpeg,jpg,png';

        return $rules;
    }


    #################################################################################
    ################################### Appends #####################################
    #################################################################################


    protected $appends = ['photo_path', 'thumbnail_path'];

    public function getPhotoPathAttribute()
    {
        return $this->photo ? asset('uploads/images/original/' . $this->photo) : null;
    }

    public function getThumbnailPathAttribute()
    {
        return asset('uploads/images/thumbnail/' . $this->photo);
    }



    #################################################################################
    ################################# Functions #####################################
    #################################################################################

    public function setPhotoAttribute($file)
    {
        if ($file) {
            $fileName = $this->createFileName($file);
            $this->originalImage($file, $fileName);
            $this->thumbImage($file, $fileName, 182, 182);
            $this->attributes['photo'] = $fileName;
        }
    }




    #################################################################################
    ################################### Scopes #####################################
    #################################################################################



    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeParent($query)
    {
        return $query->where('parent_id', null);
    }

    public function scopeChild($query)
    {
        return $query->where('parent_id', '!=', null);
    }

    public function children()
    {
        return $this->hasMany('App\Models\Category', 'parent_id', 'id');
    }
}
