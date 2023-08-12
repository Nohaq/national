<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionCollection;
use App\Http\Resources\QuestionResource;
use App\Http\Traits\GeneralTrait;
use App\Models\Answer;
use App\Models\Term;

use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class test extends Controller
{use GeneralTrait;
    public function one(){
        $q=Question::with('term','collage')->find(1);
        // return $q;
    //    return  new QuestionResource($q);
        return $this->apiResponse(new QuestionResource($q),'succes',200);
    }
}
