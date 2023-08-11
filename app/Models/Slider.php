<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=[
        'uuid',
        'link',
        'image',
        'uuid'
    ];
    // protected $fillable=;
    protected $casts=[
        'id'=>'integer',
        'uuid'=>'string',
        'link'=>'string',
        'image'=>'string'
    ];
  
}
