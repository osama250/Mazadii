<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rule extends Model
{
    use SoftDeletes , Translatable;

    public $table    = 'rules';
    protected $dates = ['deleted_at'];
    public $fillable = ['id'];
    public $translatedAttributes =  ['title', 'description'];
    public static $rules = [];
}
