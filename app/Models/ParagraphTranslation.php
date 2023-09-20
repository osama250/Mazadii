<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParagraphTranslation extends Model
{

    protected $table        = 'paragraph_translations';
    protected $primaryKey   = 'trans_id';
    protected $fillable     = ['text'];
    public $timestamps      = false;

}
