<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Code extends Model
{
    use HasFactory;use SoftDeletes;
    protected $fillable=['uuid','value','user_id','specialization_id'];
    protected $casts=[
        'id'=>'integer',
        'uuid'=>'string',
        'value'=>'string',
        'user_id'=>'integer',
        'specialization_id'=>'integer'
        
    ];
    public function user(){
        return $this->belongTo(User::class);
    }
    public function specialization(){
        return $this->belongTo(Specialization::class);
    }

}
