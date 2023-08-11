<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=[
        'content',
        'term_id',
        'specialization_id',
        'collage_id',
        'uuid',
        'referenc'
    ];
    protected $casts=[
        'id'=>'integer',
        'uuid'=>'string',
        'content'=>'string',
        'term_id'=>'integer',
        'specialization_id'=>'integer',
        'collage_id'=>'integer'
    ];
    public function term(){
        return $this->belongTo(Terms::class);
    }
    
    public function specialization(){
        return $this->belongTo(Specialization::class);
    }
    public function collage(){
        return $this->belongTo(Collage::class);
    }
    public function answers(){
        return $this->hasMany(Answer::class);
    }

}
