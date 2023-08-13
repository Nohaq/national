<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\Code;
use App\Models\User;
use App\Traits\GeneralTrait;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    use GeneralTrait;
    public function register(StoreUserRequest $request)
    {
        $request->validated($request->only(['user_name', 'phone']));
        //         $request->validated($request->all());


        $user = User::create([
            'user_name' => $request->user_name,
            'phone' => $request->phone,
            'role'=>'normal',
            'uuid'=> Str::uuid(),        
        ]);
        $code = random_int(100000,999999);
        $usercode=[
            'uuid'=> Str::uuid(),
            'value'=>$code,
        'specialization_id'=>$request->specialization_id,
        'user_id'=>$user->id];
        $genertedCode=Code::create($usercode);

        return $this->apiResponse([
            'user' => $user,
            'token' => $user->createToken('API Token')->plainTextToken,
            'code'=>$genertedCode
        ]);
    }

    
}
