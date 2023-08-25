<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Question;

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
        return $this->belongsTo(User::class);
    }
    public function question(){
        return $this->belongsTo(Question::class);
    }
   
}
