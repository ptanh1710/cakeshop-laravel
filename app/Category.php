<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    public $timestamp = false;
    public $table = 'category_product';
    public $primaryKey = 'category_id';

    public $fillable = [
        'category_id',
        'category_name',
        'category_note',
        'category_status',
    ];
}
