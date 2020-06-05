<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Category;
use Image;
use DB;
use Session;
use App\Service;
use App\User;
use Auth;
use Validator;
use Illuminate\Support\Facades\Redirect;
class ServiceController extends Controller
{
    //
    public function addService(Request $request){
        if($request->isMethod('post')){
            $data =$request->all();
            $validator = Validator::make($data,[
                'category'=>'required',
                'name'=>'required|min:3|max:25',
                'adress'=>'required|min:6|max:35',
                'openhour'=>'required',
                'closehour'=>'required',
                'description'=>'required|min:6',
                'image'=>'required|mimes:png,jpg,jpeg',
                'phone'=>'required'
               ]);
            $service = new Service;
            if($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
           $service->category_id=$data['category'];
           $service->name=$data['name'];
           $service->adress=$data['adress'];
           $service->openhour=$data['openhour'];
           $service->closehour=$data['closehour'];
           $service->phone=$data['phone'];
           $service->description=$data['description'];
           if($request->hasFile('image')){
               $image_tmp =$request->file('image');
               if($image_tmp->isValid()){
                   $extension =$image_tmp->getClientOriginalExtension();
                   $filename = rand(111,99999).'.'.$extension;
                   $large_image_path='img/backend_images/services/large/'.$filename;
                   $medium_image_path='img/backend_images/services/medium/'.$filename;
                   $samll_image_path='img/backend_images/services/small/'.$filename;
                   //Rezise image
                   Image::make($image_tmp)->save($large_image_path);
                   Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                   Image::make($image_tmp)->resize(300,300)->save($samll_image_path);
                   $service->image=$filename;
               }
           }
           $service->save();
           return redirect()->back()->with('flash_message_succ','Service add Successfully');

        }
        $categories= Category::where(['parent_id'=>0])->get();
        $category_dropdown = '<option selected value="" disabled>Select</option>';
        foreach($categories as $cat){
            $category_dropdown .= "<option value='".$cat->id."'>".$cat->name."</option>";
            $sub_cat= Category::where(['parent_id'=>$cat->id])->get();
            foreach($sub_cat as $sub){
                $category_dropdown .= "<option value= '".$sub->id."'>&nbsp;--&nbsp;".$sub->name."</option>";
            }

        }
        return view('admin.service.add_service')->with(compact('category_dropdown'));
    }
    public function userService(Request $request){
        if($request->isMethod('post')){
            $data =$request->all();
            $validator = Validator::make($data,[
                'category'=>'required',
                'name'=>'required|min:3|max:25',
                'adress'=>'required|min:6|max:35',
                'openhour'=>'required',
                'closehour'=>'required',
                'description'=>'required|min:6',
                'image'=>'required|mimes:png,jpg,jpeg',
                'phone'=>'required'
               ]);
            $service = new Service;
            if($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
           $service->category_id=$data['category'];
           $service->name=$data['name'];
           $service->adress=$data['adress'];
           $service->openhour=$data['openhour'];
           $service->closehour=$data['closehour'];
           $service->phone=$data['phone'];

           $service->description=$data['description'];
           if($request->hasFile('image')){
               $image_tmp =$request->file('image');
               if($image_tmp->isValid()){
                   $extension =$image_tmp->getClientOriginalExtension();
                   $filename = rand(111,99999).'.'.$extension;
                   $large_image_path='img/backend_images/services/large/'.$filename;
                   $medium_image_path='img/backend_images/services/medium/'.$filename;
                   $samll_image_path='img/backend_images/services/small/'.$filename;
                   //Rezise image
                   Image::make($image_tmp)->save($large_image_path);
                   Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                   Image::make($image_tmp)->resize(300,300)->save($samll_image_path);
                   $service->image=$filename;
               }
           }
           $service->user_id=auth()->user()->id;
           $service->save();
           return redirect()->back()->with('flash_message_succ','Service add Successfully');

        }
        $categories= Category::where(['parent_id'=>0])->get();
        $category_dropdown = '<option selected value="" disabled>Select</option>';
        foreach($categories as $cat){
            $category_dropdown .= "<option value='".$cat->id."'>".$cat->name."</option>";
            $sub_cat= Category::where(['parent_id'=>$cat->id])->get();
            foreach($sub_cat as $sub){
                $category_dropdown .= "<option value= '".$sub->id."'>&nbsp;--&nbsp;".$sub->name."</option>";
            }

        }
        return view('user.add_service')->with(compact('category_dropdown'));
    }
    public function viewservices(){
        $service= service::get();
        foreach($service as $key => $val){
        $category_name= Category::where(['id'=>$val->category_id])->first();
        $service[$key]->category_name =$category_name->name;
        }
        return view('admin.service.view_service')->with(compact('service'));
    }
    public function editservice(Request $request,$id){

        if($request->isMethod('post')){
            $data = $request->all();
            $validator = Validator::make($data,[
                'category'=>'required',
                'name'=>'required|min:3|max:25',
                'adress'=>'required|min:6|max:35',
                'openhour'=>'required',
                'closehour'=>'required',
                'description'=>'required|min:6',

                'phone'=>'required'
               ]);
            if($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            if($request->hasFile('image')){
                $image_tmp =$request->file('image');
                if($image_tmp->isValid()){
                    $extension =$image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $large_image_path='img/backend_images/services/large/'.$filename;
                    $medium_image_path='img/backend_images/services/medium/'.$filename;
                    $samll_image_path='img/backend_images/services/small/'.$filename;
                    //Rezise image
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300,300)->save($samll_image_path);

                }
                else  $filename=$data['current_image'];
            }
            Service::where(['id'=>$id])->update(['id'=>$data['category'],'name'=>$data['name'],'adress'=>$data['adress']
            ,'openhour'=>$data['openhour'],'closehour'=>$data['closehour'],'description'=>$data['description'],'phone'=>$data['phone'],'image'=>$filename]);
            return redirect('/admin/view-service')->with('flash_message_succ',' Edit service  Successfully');
        }
        $service= Service::where(['id'=>$id])->first();
        $categories= Category::where(['parent_id'=>0])->get();
        $category_dropdown = "<option value=''  selected disabled>Select</option>";
        foreach($categories as $cat){
            if($cat->id == $service->category_id){
                $selected= "selected";
            }
            else{
                $selected ="";
            }
            $category_dropdown .= "<option value='".$cat->id."'".$selected." >".$cat->name."</option>";
            $sub_cat= Category::where(['parent_id'=>$cat->id])->get();
            foreach($sub_cat as $sub){
                if($sub->id == $service->category_id){
                    $selected= "selected";
                }
                else{
                    $selected ="";
                }
                $category_dropdown .= "<option value= '".$sub->id."' ".$selected.">&nbsp;--&nbsp;".$sub->name."</option>";
            }
        }
        return view('admin.service.edit_service')->with(compact('service','category_dropdown'));
    }
    public function deleteImage($id){
        $serviceimage =Service::where(['id'=>$id])->first();
       $large_image_path = '/img/backend_images/services/large';
       $meduim_image_path = '/img/backend_images/services/medium';
       $small_image_path = '/img/backend_images/services/small';
       if(file_exists($large_image_path.$serviceimage->image)){
           unlink($large_image_path.$serviceimage->image);
       }
       if(file_exists($meduim_image_path.$serviceimage->image)){
        unlink($meduim_image_path.$serviceimage->image);
    }
    if(file_exists($small_image_path.$serviceimage->image)){
        unlink($small_image_path.$serviceimage->image);
    }
        Service::where(['id'=>$id])->update(['image'=>'']);
        return redirect()->back()->with('flash_message_succ','Image deleted successfully');
    }
    public function deleteservice($id){
     Service::where(['id'=>$id])->delete();
     return redirect()->back()->with('flash_message_succ','Categorie deleted Successfully');
    }

    public function deletealtservice($id){
    $img=Imageservice::where(['id'=>$id])->delete();
    return redirect()->back()->with('flash_messsage_succ','Images has been Deleted');
    }

    public function services($url){
        $count=Category::where(['name'=>$url])->count();
        if($count==0){
            abort(404);
        }
     $categorie=Category::with('categories')->where(['parent_id'=>0])->get();
     $categorydet=Category::where(['name'=>$url])->first();
   if($categorydet->parent_id==0){
         $sub_cat=Category::where(['parent_id'=>$categorydet->id])->get();
         foreach($sub_cat as $sub){
             $cat_id [] = $sub->id;
         }
         $service=Service::whereIn('category_id',$cat_id)->get();
     }
     else {
     $service=Service::where(['category_id'=> $categorydet->id])->get();
     }
     return view('admin.service.listing')->with(compact('categorie','categorydet','service'));
 }
  public function service($id){
         $servicedet=service::where(['id'=> $id])->first();
         $related_service=service::where('id','!=',$id)->where(['category_id'=>$servicedet->category_id])->get();
         $categorie=Category::with('categories')->where(['parent_id'=>0])->get();
         return view('admin.service.details')->with(compact('servicedet','categorie','related_service'));

    }

}
