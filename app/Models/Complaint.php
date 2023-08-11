<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Symfony\Component\Routing\Loader\Configurator\Traits\AddTrait;

class Complaint extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=[
        'uuid',
        'content',
        'user_id',
    ];
    protected $casts=[
        'uuid'=>'string',
        'content'=>'string',
        'user_id'=>'integer',
    ];

public function user(){
    return $this->belongsTo(User::class);
}

}
