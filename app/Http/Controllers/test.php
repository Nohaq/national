<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionCollection;
use App\Http\Resources\QuestionResource;
use App\Http\Resources\UserResource;
use App\Http\Traits\GeneralTrait;
use App\Models\Answer;
use App\Models\Term;
use Illuminate\Support\Facades\Auth;

use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class test extends Controller
{use GeneralTrait;
    public function one(){
        $user= auth('sanctum')->user();
       return (isset($user));
    }
}
