<?php

namespace App\Http\Controllers;
use App\Http\Resources\CategoryResource;
use App\Traits\GeneralTrait;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    use GeneralTrait;
    use UploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $category = Category::with('collages')->get();
    
            if (request()->expectsJson()) {
                return $this->apiResponse(CategoryResource::collection($category), true, 'Success', 200);
            } else {
                return view('categories.index', compact('category'));
            }
        } catch (\Exception $ex) {
            return $this->apiResponse(response()->json([]), false, $ex->getMessage(), 500);
        }
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
        return view('categories.create');

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
            'category_name'=>'required|max:255',
            'logo' => 'required|file',
        ]);
    
        // dd($request['category_name']);
        $logo = $request->file('logo');
        // $logo_path = $this->uploadOne($logo, 'uploads', 'public');


        $filename = Str::random(16).$logo->getClientOriginalName();
        $logo->storeAs('public/images', $filename);

        $category= Category::create([
            'uuid' => Str::uuid(),
            'category_name' => $request['category_name'],
            'logo' => $filename,
        ]);
    
        return $category;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        return view('categories.show',compact('category'));

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
    public function edit($id)
    {
        $category = Category::find($id);
        return view('categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $input = $request->all();
        $category->update($input);
        $category->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $category=Category::find($id);
        $category->forceDelete();
 
         return redirect('/');

    }
}
