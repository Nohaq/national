<?php

namespace App\Http\Controllers;

use App\Http\Resources\TermResource;
use App\Models\Collage;
use App\Models\Term;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;

class TermsController extends Controller
{
    use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
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
     * @param  \App\Models\Terms  $terms
     * @return \Illuminate\Http\Response
     */
    public function show(Terms $terms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Terms  $terms
     * @return \Illuminate\Http\Response
     */
    public function edit(Terms $terms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Terms  $terms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Terms $terms)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Terms  $terms
     * @return \Illuminate\Http\Response
     */
    public function destroy(Terms $terms)
    {
        //
    }
    public function terms($type,$uuid){
        try{
            $collage=Collage::where('uuid',$uuid)->first()->id;
            // return $collage;
            $Terms=Term::all()->where('type',$type)->where('collage_id',$collage);
            return $this->apiResponse(TermResource::collection($Terms),'succes','',200);
    }
    catch(\Exception $ex)
    {
        return $this->apiResponse(json_decode('{}'),false, $ex->getMessage(),500);
    }

    }
    // public function graduteTerms(){
    //     try{
    //         $masterTerms=Terms::all()->where('type','gradute')->with('questions')->get();
    //         return $this->apiResponse(TermResource::collection($masterTerms),true,'succes',200);
    // }
    // catch(\Exception $ex)
    // {
    //     return $this->apiResponse(json_decode('{}'),false, $ex->getMessage(),500);
    // }
        
    // }
}
