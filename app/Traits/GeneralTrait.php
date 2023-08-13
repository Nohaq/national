<?php

namespace App\Traits;

trait GeneralTrait{
    public function apiResponse($data=null,$status=true,$error=null,$statusCode=200){

        $array =[
            'data'=>$data,
            'status'=>$status,
            'error'=>$error,
            'statusCode'=>$statusCode

        ];
        return response()->json($array);
    }
}