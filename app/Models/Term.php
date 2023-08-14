<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Term extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=['term_name','specialization_id','collage_id','type','uuid'];
    protected $casts=[
        'id'=>'integer',
        'uuid'=>'string',
        'specialization_name'=>'string',
        'collage_id'=>'integer'
    ];
    public function questions(){
        return $this->hasMany(Question::class);
    }
    public function specialization(){
        return $this->belongsTo(Specialization::class);
    }
    public function collage(){
        return $this->belongsTo(Collage::class);
    }

}
