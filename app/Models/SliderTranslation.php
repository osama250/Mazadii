<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SliderTranslation extends Model
{
    protected $table       = 'slider_translations';
    protected $primaryKey  = 'id';
    protected $fillable    = ['title', 'subtitle', 'content', 'button_text'];
    public $timestamps     = false;
}
