<?php

namespace App\Http\Controllers;

use Illuminate\Support\Fecades\Response;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
   public function getCategoryIndex()
   {
   	 $categories=Category::orderBy('created_at','desc')->paginate(5);
   	 return view('admin.blog.categories',['categories'=> $categories]);	
   }

   public function postCreateCategory(Request $request) 
   {
       $this->validate($request,[
           'name' => 'required|unique:categories'
       ]);
       $category = new Category();
       $category->name = $request['name'];
       if($category->save()) {
         return Response()->json(['message' => 'Category created'],200);
       }
       return Response()->json(['message' => 'Error during creation'],404);
   }

   public function postUpdateCategory(Request $request)
   {
   	 $this->validate($request,[
         'name'=> 'required|unique:categories'
   	 ]);

   	 $category =Category::find($request['category_id']);
   	 if($category) {
   	 	return Response()->json(['message'=>'Category not found'],400);
   	 }
   	 $category->name = $request['name'];
   	 $category->update();
   	 return Response()->json(['message' => 'Category updated','new_name' => $request['name']],200);
   }

   public function getDeleteCategory($category_id)
    {
      $category=Category::find($category_id);
      $category->delete();
      return Response()->json(['message' => 'category deleted!'],200);
   }
}