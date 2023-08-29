<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Http\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{use GeneralTrait;
    public function editProfile(Request $request){
    $validator =Validator::make($request->all(),[
        'user_name' => 'required|string',
        'phone' => 'required|string|size:10|starts_with:09'
    ]);
    if($validator->fails())
    {
        return $this->apiResponse( json_decode('{}'),false,$validator->errors(),300);
    }
    $user=auth('sanctum')->user();
    try{
        $user->update($request->all());
        $user->save();
        return $this->apiResponse( new UserResource($user),'profile updated','',200);

    }
    catch(\Exception $ex)
    {
        return $this->apiResponse(json_decode('{}'),false, $ex->getMessage(),500);
    }

    
  
}
}

