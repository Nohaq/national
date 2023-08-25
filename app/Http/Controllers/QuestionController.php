<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use App\Http\Traits\GeneralTrait;
use App\Models\Question;
use App\Models\Term;
use Illuminate\Http\Request;

class QuestionController extends Controller
{use GeneralTrait;
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
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
    public function questionsOfTerm($uuid){
        try{
            $term=Term::where('uuid',$uuid)->first()->id;
            // return $term;
            if (isset($term)){
                $qeustions=Question::where('term_id',$term)->with('answers')->get();
                return 
                $this->apiResponse(QuestionResource::collection($qeustions),'term question get succesfully','',500);
            }
            else 
            return $this->apiResponse(json_decode('{}'),false,'term not found',403);

        }
        catch(\Exception $ex)
        {
            return $this->apiResponse(json_decode('{}'),false, $ex->getMessage(),500);
        }
    }
}
