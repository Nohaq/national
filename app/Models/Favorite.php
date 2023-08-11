<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    protected $fillable=['user_id','question_id','uuid'];
    protected $casts=[
        'id'=>'integer',
        'uuid'=>'string',
        'user_id'=>'integer',
        'question_id'=>'integer'
    ];
    public function user(){
        return $this->belongTo(User::class);
    }
    public function question(){
        return $this->belongTo(Question::class);
    }
   
}
