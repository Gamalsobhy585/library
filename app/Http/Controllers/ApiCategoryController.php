<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Http\Models\Category;


class ApiCategoryController extends Controller
{
    public function index()
    {
  $categories= Category::Select('id','name','img')->orderBy('id','desc')->paginate(3);
  return  CategoryResource::collection($categories);
} 

public function store(Request $request)
{
   $data= $request->validate([
        'name'=>'required|string|max:20',
        'desc'=>'required|string',
        'img'=>'required|image|mimes:png,jpg,|max:1024',
    ]);

    $fileName=Storage::putFile("public/categories",$data['img']);
    $data['img']=$fileName;
Category::create($data);

return response()->json([
    'success'=>'category created successfully'
]);
}









public function show(Category $category)
{
return new CategoryResource($category);
}
public function edit (Category $category)
{  
    
    // $category=Category::findorFail($category);
    
    return  view('categories.edit',['category'=>$category]);
}

public function update(Request $request,Category $category)
{
   $data= $request->validate([
        'name'=>'required|string|max:10',
        'desc'=>'required|string',
        'img'=>'nullable|image|mimes:png,jpg,|max:1024',

    ]);

    if($request->hasFile('img')){
        Storage::delete($category->img);
        $filename=Storage::putFile("public/categories",$data['img']);
        $data['img']=$filename;
    }
$category->update($data);
return response()->json([
    'success'=>'category updated successfully'
]);
}
public function destroy(Category $category)
{
Storage::delete($category->img);
$category->delete();
return response()->json([
    'success'=>'category deleted successfully'
]);}


}
