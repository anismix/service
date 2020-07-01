<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;
use App\Service;
use App\Category;
use App\Post;

class IndexController extends Controller
{
    public function index(){
       // in random order
     //  $productAll= Product::inRandomOrder('id','DESC')->get();
        $serviceAll= Service::orderBy('id','DESC')->get();
    $categorie=Category::with('categories')->where(['parent_id'=>0])->get();
    //    echo'<pre>';echo($categorie);die;  */

        return view('index')->with(compact('serviceAll','categorie'));
        }
        public function search(Request $request){
            $query=$request->input('query');
            $serviceAll= Service::where('name','LIKE',"%$query%")->Orwhere('adress','LIKE',"%$query%")->orderBy('id','DESC')->get();
            $categorie=Category::with('categories')->where(['parent_id'=>0])->get();
            return view('user.search')->with(compact('serviceAll','categorie'));
        }

        public function searchpost(Request $request){
            $query=$request->input('s');
            $post= Post::where('post','LIKE',"%$query%")->orderBy('id','DESC')->get();
            $user=User::get();
            $comment=Comment::get();
            return view('user.blog')->with(compact('post','user','service','comment'));
        }
    }
