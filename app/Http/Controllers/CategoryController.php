<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Redirect;
class CategoryController extends Controller
{
    //
    public function addCategory(Request $request){

        if($request->isMethod('post')){
            $data= $request->all();
            $validator = Validator::make($data,[
            'name'=>'required|min:3',
            'description'=>'required|min:5'
           ]);
      if($validator->fails()) {
        return Redirect::back()->withErrors($validator);
    }
       $category =new Category;
       $category->name=$data['name'];
       $category->description=$data['description'];
       $category->parent_id=$data['Main_category'];
      // $category->status=$status;
       $category->save();
       return redirect('/admin/view-category')->with('flash_message_succ','Category add Successfully');
   }
        $levles =  Category::where(['parent_id'=>0])->get();

     return view('admin.category.add_category')->with(compact('levles'));
    }
    public function viewCategories(){
        $category =Category::get();
             return view('admin.category.view_category')->with(compact('category'));
    }
    public function editCategory(Request $request,$id){
        if($request->isMethod('post')){
            $data= $request->all();
            $validator = Validator::make($data,[
                'name'=>'required|min:3',
                'description'=>'min:5'
               ]);
               if($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
           Category::where(['id'=>$id])->update(['name'=>$data['name'],'description'=>$data['description'],'parent_id'=>$data['Main_category']]);
           return redirect('/admin/view-category')->with('flash_message_succ',' Edit Category  Successfully');
        }
        $levles =  Category::where(['parent_id'=>0])->get();
        $catdetails = Category::where(['id'=>$id])->first();
        return view('admin.category.edit_category')->with(compact('catdetails','levles'));
    }
    public function deleteCategory($id){
      if(!empty($id)){
      Category::where(['id'=>$id])->delete();
      return  redirect()->back()->with('flash_message_success','category has deleted success');


}
    }

}
