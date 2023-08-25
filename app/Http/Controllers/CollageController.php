<?php

namespace App\Http\Controllers;

use App\Http\Resources\CollageResource;
use App\Models\Collage;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
class CollageController extends Controller
{
    use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
        $collage=Collage::with('category')->get();
        return $this->apiResponse(CollageResource::collection( $collage),true,'succes',200);
        }
        catch(\Exception $ex)
        {
            return $this->apiResponse(json_decode('{}'),false, $ex->getMessage(),500);
        }
        
    }
    public function collageById($uuid){
        try{
            $Collage=Collage::with('specializations')->where('uuid',$uuid)->get();
            return $this->apiResponse(CollageResource::collection($Collage),'succes','',200);
            
        }
        catch(\Exception $ex)
        {
            return $this->apiResponse(json_decode('{}'),false, $ex->getMessage(),500);
        }
       


    }
    public function subjects($uuid){
        try{
        $Collage=Collage::with('subjects')->where('uuid',$uuid)->get();
        return $this->apiResponse(CollageResource::collection($Collage),'succes','',200);
        }
        catch(\Exception $ex)
        {
            return $this->apiResponse(json_decode('{}'),false, $ex->getMessage(),500);
        }
       
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collage  $collage
     * @return \Illuminate\Http\Response
     */
    public function show(Collage $collage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Collage  $collage
     * @return \Illuminate\Http\Response
     */
    public function edit(Collage $collage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Collage  $collage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collage $collage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collage  $collage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collage $collage)
    {
        //
    }
}
