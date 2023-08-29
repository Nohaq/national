<?php

namespace App\Http\Controllers;

use App\Models\Collage;
use App\Models\Specialization;
use App\Models\Term;
use App\Models\Terms;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
        $terms = Term::with('specialization','collage')->get();
        return view('terms.index',compact('terms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specializations = Specialization::all();
        $collages = Collage::all();

        return view('terms.create', compact('specializations','collages'));

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
            'term_name'=>'required|max:255',
            'type' => 'required',
            'specialization_id' => 'required',            
            'collage_id' => 'required',
        ]);
    
        $term= Term::create([
            'uuid' => Str::uuid(),
            'term_name' => $request['term_name'],
            'type' => $request['type'],
            'specialization_id' => $request['specialization_id'],
            'collage_id' => $request['collage_id'],
        ]);
    
        return $term;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Terms  $terms
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $term = Term::find($id);
        $specialization = $term->specialization;
        $collage = $term->collage;
        return view('terms.show', compact('term', 'specialization', 'collage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Terms  $terms
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $term = Term::find($id);
        $specializations = Specialization::all();
        $collages = Collage::all();
        return view('terms.edit',compact('term','specializations','collages'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Terms  $terms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $term = Term::find($id);
        $input = $request->all();
        $term->update($input);
        $term->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Terms  $terms
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $term =Term::find($id);
        $term->Delete();

        return redirect('/');
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
