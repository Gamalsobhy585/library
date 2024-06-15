<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
  $categories= Category::Select('id','name','img')->orderBy('id','desc')->paginate(3);
        return  view('categories.index',['categories'=>$categories]);
    
}    

public function create()
{
    return  view('categories.create');

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
$request->session()->flash('success_msg','Category Created Successfully');

return redirect (url('/categories'));
}
public function show(Category $category)
{
    $category->load('books');
    return view('categories.show', ['category' => $category]);
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
return redirect (url('/categories'));

}
public function destroy(Category $category)
{
Storage::delete($category->img);
$category->delete();
return redirect (url('/categories'));
}



}
