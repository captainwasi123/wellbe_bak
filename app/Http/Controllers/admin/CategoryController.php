<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;

class CategoryController extends Controller
{
    function index(){ 
        $data = array(
            "category" => Categories::get(),
        );
        return view('admin.category.all_category')->with($data);
    }

    function add_categories(Request $request){
        if(!empty($request->cat_id)){
            $category = Categories::where('id',$request->cat_id)->first();
            $msg = "Category Updated Successfully";
        }else{
            $category = new Categories();
            $msg = "Category Added Successfully";
        }
        $category->category = $request->cat_name;
        if($request->hasFile('cat_img')){
            $cat_img =  \App\Helpers\CommonHelpers::uploadSingleFile($request->cat_img, 'public/upload/category_img/', 'png,gif,jpeg,jpg');
            $category->image = $cat_img;
        }
        $category->status = 1;
        $category->save();

        return redirect()->route('admin.categories')->with('success',$msg);
    }

    function edit_category(Request $request){
        $id = base64_decode($request->id);        
        $category = new Categories();
        $data = array(
            'edit_data' => $category::where('id',$id)->first(),
            "category" => Categories::get(),
            'is_edit' => true,
        );
        return view('admin.category.all_category')->with($data);
    }

    public function delete_category(Request $request)
    {
        $id = base64_decode($request->id);  
        \DB::table('tbl_service_category')->delete($id);
        return redirect()->route('admin.categories')->with('success',"Category Deleted Successfully");
    }
}
