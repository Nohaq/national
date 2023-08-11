<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specialization extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=['specialization_name','collage_id','uuid'];
    protected $casts=[
        'id'=>'integer',
        'uuid'=>'string',
        'specialization_name'=>'string',
        'collage_id'=>'integer'
    ];
    public function questions(){
        return $this->hasMany(Question::class);
    }
    public function collage(){
        return $this->belongsTo(Collage::class);
    }
    // public function terms(){
    //     return $this->hasMany(Term::class);
    // }
    
}
