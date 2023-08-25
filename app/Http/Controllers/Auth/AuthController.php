<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\CodeCollection;
use App\Http\Resources\CodeResource;
use App\Http\Resources\UserResource;
use App\Models\Code;
use App\Models\User;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PHPUnit\Framework\Constraint\IsEmpty;
use Validator;

class AuthController extends Controller
{
    use GeneralTrait;
    public function register(Request $request)
    {
        $validator =Validator::make($request->all(),[
            'user_name' => 'required|string',
            'phone' => 'required|string|size:10|starts_with:09'
        ]);
        if($validator->fails())
        {
            return $this->apiResponse( json_decode('{}'),false,$validator->errors(),300);
        }
        try{
           $isRegiserdWithPhone=User::all()->where('phone',$request['phone'])->first();
           if (!isset($isRegiserdWithPhone))
           {
            $user = User::create([
                'user_name' => $request->user_name,
                'phone' => $request->phone,
                'role'=>'normal',
                'uuid'=> Str::uuid(),        
        ]);
    }
    else 

    $user=$isRegiserdWithPhone;
    $isRegisteredWithCollage=Code::all()
    ->where('user_id',$user->id)
    ->where('collage_id',$request['collage_id'])->first();
    if (isset($isRegisteredWithCollage)){
        return $this->apiResponse( $user->codes,false,
                                    'you have already registerid this collage',300);
    }else {

        $code = random_int(100000,999999);
        $codeRow=[
            'uuid'=> Str::uuid(),
            'value'=>$code,
            'collage_id'=>$request->collage_id,
            'user_id'=>$user->id];
            $genertedCode=Code::create($codeRow);
            // return $this->apiResponse( json_decode('{}'),true,'succes register',200);

            return $this->apiResponse( response()->json(['code'=>$code]),true,'succes register',200);
        }
    }
    catch(\Exception $ex)
    {
        return $this->apiResponse(response()->json([]),false, $ex->getMessage(),500);
    }
        
    }
    public function login(Request $request)
    {
        $validator =Validator::make($request->all(),[
            'user_name' => 'required|string',
            'code' => 'required|string|size:6'
        ]);
        if($validator->fails())
        {
            return $this->apiResponse(response()->json([]),false,$validator->errors(),300);
        }
        try {
            $user = User::where('user_name',$request['user_name'])
                ->whereRelation('codes','value',$request['code'])->first();
                if (!$user) {
                    return $this->apiResponse(json_decode('{}'),false,'in correct code or username',403);
                }
                $token = $user->createToken('apiToken')->plainTextToken;
                $data=[
                    'user'=>new UserResource($user),
                    'token'=>$token,
                    'collage'=>Code::all()->where('value',$request['code'])->first()->collage,
                ];
                return $this->apiResponse($data,true, 'User has logged in successfully.',200);
            }
        catch(\Exception $ex)
        {
            return $this->apiResponse(response()->json([]),false, $ex->getMessage(),500);
        }
    }

    public function logout(Request $request)
    {
        auth('sanctum')->user()->tokens()->delete();
        return $this->apiResponse(null,true,'User has logged out successfully.' ,200);
   }    
}
