<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Code extends Model
{
    use HasFactory;use SoftDeletes;
    protected $fillable=['uuid','value','user_id','collage_id'];
    protected $casts=[
        'id'=>'integer',
        'uuid'=>'string',
        'value'=>'string',
        'user_id'=>'integer',
        'specialization_id'=>'integer'
        
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function collage(){
        return $this->belongsTo(Collage::class);
    }

}
