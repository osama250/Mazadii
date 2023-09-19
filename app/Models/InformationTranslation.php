<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformationTranslation extends Model
{

    protected $table      = 'information_translations';
    protected $primaryKey = 'id';
    protected $fillable   = ['name', 'value'];
    public $timestamps    = false;
}
