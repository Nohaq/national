<?php

namespace App\Http\Controllers;

use App\Http\Resources\FavoriteResource;
use App\Models\Favorite;
use App\Models\Question;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\GeneralTrait;
// use Str;

class FavoriteController extends Controller
{
    use GeneralTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){


    }
    public function favouritesOfUser()
    {
        try{
            $favourites=Favorite::with('question')->get();
            // with('question')->where('user_id',2);
            // return $favourites;
            return $this->apiResponse(FavoriteResource::collection($favourites),true,'favourites',200);

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
    public function create($uuid)
    {
        try{
           $newFav= Favorite::create([
            'uuid'=> Str::uuid(),
            // 'user_id'=>Auth::id(),
            'user_id'=>2,
            'question_id'=>Question::where('uuid',$uuid)->first()->id,
            ]);
            if (isset($newFav)){
                return $this->apiResponse(json_decode('{}'),true,'new favourite question added',200);
    
            }
            else
            return $this->apiResponse(json_decode('{}'),false,'error adding Favorite',300);


        }
        catch(\Exception $ex)
        {
            return $this->apiResponse(json_decode('{}'),false, $ex->getMessage(),500);
        }
        
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
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function show(Favorite $favorite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function edit(Favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Favorite $favorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Favorite $favorite)
    {
        //
    }
}
