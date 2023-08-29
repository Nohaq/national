<?php

namespace App\Http\Controllers;

use App\Models\Collage;
use App\Models\Specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class SpecializationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specializations = Specialization::with('collage')->get();
        return view('specializations.index',compact('specializations'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $collages = Collage::all();

        return view('specializations.create', compact('collages'));

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
            'specialization_name'=>'required|max:255',
            'collage_id' => 'required',
        ]);
    
        $specialization= Specialization::create([
            'uuid' => Str::uuid(),
            'specialization_name' => $request['specialization_name'],
            'collage_id' => $request['collage_id'],
        ]);
    
        return $specialization;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Specialization  $specialization
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $specialization = Specialization::find($id);
        $collage = $specialization->collage;
        return view('specializations.show',compact('specialization','collage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Specialization  $specialization
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $specialization = Specialization::find($id);
        $collages = Collage::all();
        return view('specializations.edit',compact('specialization','collages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Specialization  $specialization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $specialization = Specialization::find($id);
        $input = $request->all();
        $specialization->update($input);
        $specialization->save();

        return redirect('/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Specialization  $specialization
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $specialization=Specialization::find($id);
        $specialization->forceDelete();
 
         return redirect('/');
    }
}
