<?php

namespace App\Http\Controllers;
use App\Http\Resources\CategoryResource;
use App\Traits\GeneralTrait;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try{
            $category=Category::with('collages')->get();
            return $this->apiResponse(CategoryResource::collection($category),'succes','',200);
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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }
    public function categoryById($uuid){
        try{
        $category=Category::with('collages')->where('uuid',$uuid)->get();
        return $this->apiResponse(CategoryResource::collection( $category),'succes','',200);
    }
    catch(\Exception $ex)
    {
        return $this->apiResponse(json_decode('{}'),false, $ex->getMessage(),500);
    }



    }
  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
