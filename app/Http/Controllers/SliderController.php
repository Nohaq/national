<?php

namespace App\Http\Controllers;

use App\Http\Resources\SliderResource;
use App\Http\Traits\GeneralTrait;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
      use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function index()
    {
        
    }
    public function sliders(){
        try{
            $sliders=Slider::all();
            if (isset($sliders)){
                return $this->apiResponse(SliderResource::collection($sliders),true, "all sliders",200);
     
            }
            else{
                return $this->apiResponse(response()->json([]),false,"no sliders found",200);
            }
            
        }
        catch(\Exception $ex)
        {
            return $this->apiResponse(response()->json([]),false, $ex->getMessage(),500);
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
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        //
    }
}
