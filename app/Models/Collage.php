<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Collage extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=['collage_name','uuid','logo'];
    protected $casts=[
        'id'=>'integer',
        'uuid'=>'string',
        'collage_name'=>'string',
        'category_id'=>'integer',
    ];
    public function category(){
        return $this->belongTo(Category::class);
    }
    public function questions(){
        return $this->hasMany(Question::class);
    }
    public function specialization(){
        return $this->hasMany(Specialization::class);
    }
   
}
