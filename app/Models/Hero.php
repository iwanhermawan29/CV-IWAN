<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    protected $table = 'heroes';
    protected $fillable = [
        'background_image',
        'heading',
        'subheading',
        'button_text',
        'button_url',
        'order',
    ];
}
