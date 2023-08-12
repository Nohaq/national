<?php
namespace App\Http\Traits;
trait GeneralTrait{

    protected function successResponse($data, $message = null, $code = 200)
    {
        return response()->json([
            'status'=> 'Success',
            'message' => $message,
            'data' => $data
        ], $code);
    }

    protected function errorResponse($message = null, $code)
    {
        return response()->json([
            'status'=>'Error',
            'message' => $message,
            'data' => null
        ], $code);
    }

    public function apiResponse($data=null,$status=true,$error=null,$statusCode=200){

        $array =[
            'data'=>$data,
            'status'=>$status,
            'error'=>$error,
            'statusCode'=>$statusCode

        ];
        return response()->json($array);
    }
    public function unAuthorisedRespons(){
        return $this->apiResponse(null,0,'un authorized',401);
    }
    public function notFoundMessage($more=null){
        return $this->apiResponse(null,1,$more.'not found in our datatbase',404);
    }

    public function requiredField($message){
        return $this->apiResponse(null,false ,$message,200);
    }
    function apiValidation($request ,$array)
    {
        foreach($array as $field){
            if (!$request->has($field))
            return [false,'field '.$field.' is requeried'];
            if ($request[$field]==null)
             return [false,'field '.$field.' cant be empty']; 
        }
        return [true ,'no error'];
    }




}
