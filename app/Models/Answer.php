<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    use HasFactory;use SoftDeletes;
    protected $fillable=['content','istrue','question_id','uuid'];
    protected $casts=[
        'id'=>'integer',
        'uuid'=>'string',
        'content'=>'string',
        'istrue'=>'boolean',
        'question_id'=>'integer'
    ];
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
