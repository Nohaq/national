<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;


class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $answers = Answer::with('question')->orderBy('question_id', 'asc')->get();
        return view('answers.index',compact('answers'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questions = Question::all();

        return view('answers.create', compact('questions'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'question_id' => 'required',
            'istrue' => [
                'required',
                'boolean',
                Rule::unique('answers', 'istrue')->where('istrue', true)->where('question_id', $request->get('question_id'))
            ]
        ]);
    
        // if ($request->get('istrue') && Answer::where('question_id', $request->get('question_id'))->where('istrue', true)->exists()) {
        //     $this->errors->add('istrue', 'There can only be one true answer for each question.');
        // }
    
        $answer = Answer::create([
            'uuid' => Str::uuid(),
            'content' => $request['content'],
            'istrue' => $request['istrue'],
            'question_id' => $request['question_id'],
        ]);
    
        return $answer;
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $answer = Answer::find($id);
        $question = Question::find($answer->question_id);
        return view('answers.show', compact('answer', 'question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $answer = Answer::find($id);
        $questions = Question::all();
        return view('answers.edit',compact('answer','questions'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $answer = Answer::find($id);
        $input = $request->all();
        $answer->update($input);
        $answer->save();

        return redirect('/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $answer=Answer::find($id);
        $answer->forceDelete();
 
         return redirect('/');
    }

}
