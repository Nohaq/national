<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\Code;
use App\Models\User;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;

class AuthController extends Controller
{
    use GeneralTrait;
    public function register(Request $request)
    {
    //    if( $request->validated($request->only(['user_name', 'phone']))){
    //     return 'gggggggg';
    //     return $this->apiResponse([null,validator()->errors(),false,300
          
    //     ]);

    //    };
        

        //  $request->validated($request->only(['user_name', 'phone']));

        $validator =Validator::make($request->all(),[
            'user_name' => 'required|string',
            'phone' => 'required|string|size:10'
        ]);
        if($validator->fails())
        {
            return $this->apiResponse(json_encode([], JSON_FORCE_OBJECT),false,$validator->errors(),300);
        }
        try{
            // $x=User::all()->where('phone',$request['phone']);
            // if(!empty($x)){
            //     // return $this->apiResponse(null,false,'phone already registerd',300);
            //     return $x;
            // }
        $user = User::create([
            'user_name' => $request->user_name,
            'phone' => $request->phone,
            'role'=>'normal',
            'uuid'=> Str::uuid(),        
        ]);
        $code = random_int(100000,999999);
        $codeRow=[
            'uuid'=> Str::uuid(),
            'value'=>$code,
            'collage_id'=>$request->collage_id,
            'user_id'=>$user->id];
            $genertedCode=Code::create($codeRow);
            if(!$genertedCode){
                $user->delete();
                return $this->apiResponse(json_encode([], JSON_FORCE_OBJECT),'connection error',false,500);
            }
            return $this->apiResponse(
            //     'user' => new UserResource($user),
            //     'token' => $user->createToken('API Token')->plainTextToken
            // ]
            json_decode('{}')
            ,null,'succes register',200);
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
            return $this->apiResponse(null,false,$validator->errors(),300);
        }
        try {
            $user = User::where('user_name',$request['user_name'])
                ->whereRelation('code','value',$request['code'])->first();
                if (!$user) {
                    return $this->apiResponse(null,false,'in correct code or username',403);
                }
                $token = $user->createToken('apiToken')->plainTextToken;
                return $this->apiResponse([new UserResource($user),$token],true, 'User has logged in successfully.',200);
            }
        catch(\Exception $ex)
        {
            return $this->apiResponse(null,false, $ex->getMessage(),500);
        }
    }

    public function logout(Request $request)
    {
        auth('sanctum')->user()->tokens()->delete();
        return $this->apiResponse(null,true,'User has logged out successfully.' ,200);
   }    
}
