<?php

namespace App\Http\Controllers;

use App\Models\Collage;
use App\Models\Question;
use App\Models\Specialization;
use App\Models\Subject;
use App\Models\Term;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::with('subject', 'term', 'specialization', 'collage')->get();
        return view('questions.index',compact('questions'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();
        $terms=Term::all();
        $specializations=Specialization::all();
        $collages = Collage::all();
        return view('questions.create',compact('subjects','terms','specializations','collages'));
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
            'content'=>'required|max:255',
            'referenc'=>'required',
            'subject_id' => 'required',
            'term_id' => 'required',
            'specialization_id' => 'required',
            'collage_id' => 'required',
        ]);
        $question= Question::create([
            'uuid' => Str::uuid(),
            'content' => $request['content'],
            'referenc' => $request['referenc'],
            'subject_id' => $request['subject_id'],
            'term_id' => $request['term_id'],
            'specialization_id' => $request['specialization_id'],
            'collage_id' => $request['collage_id'],
        ]);
    
        return $question;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::find($id);
        $subject = $question->subject;
        $term = $question->term;
        $specialization = $question->specialization;
        $collage = $question->collage;

        return view('questions.show',compact('question','subject','term','specialization','collage'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $question=Question::find($id);
        $subjects = Subject::all();
        $terms=Term::all();
        $specializations=Specialization::all();
        $collages = Collage::all();
        return view('questions.edit',compact('question','subjects','terms','specializations','collages'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $question = Question::find($id);
        $input = $request->all();
        $question->update($input);
        $question->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question=Question::find($id);
        $question->forceDelete();
 
         return redirect('/');

    }
}
