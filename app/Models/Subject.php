<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=[
        'subject_name'
        ,'uuid'
        ,'collage_id'
    ];
    protected $casts=[
        'id'=>'integer',
        'uuid'=>'string',
        'subject_name'=>'string',
        'collage_id'=>'integer'
    ];
}
