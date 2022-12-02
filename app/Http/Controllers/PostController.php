<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Toastr;

class PostController extends Controller
{
    public function showData () {
        $posts = Post::latest()->simplepaginate(10);
        $trashPosts = Post::onlyTrashed()->latest()->simplepaginate(10);
      
        
        return view('show_data',compact ('posts','trashPosts'));
    }
     public function addData() {
        return view('add_data');
     }
     public function storeData(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $rules = [
                'title'=>'required',
                'description'=>'required',
            ];
            $cm = [
                'title.required'=>'পোষ্ট টাইটেল যুক্ত করুন',
                'description.required'=>'বিস্তারিত মেসেজ যুক্ত করুন',
            ];
            $this->validate($request,$rules,$cm);
            $post = new Post ();
            $post->title =$data['title'];
            $post->description = $data['description'];
            $post->status ='0';
            $post->save();
            Toastr::success('ডাটা সঠিকভাবে যুক্ত হয়েছে', 'সাকসেস', ["positionClass" => "toast-top-right","closeButton"=> true,"progressBar"=> true,]);
            return redirect('/show-data');
        }
     }
     public function editData ($id =null) {
        $post = Post::findOrFail($id);
        return view ('edit_data',compact('post'));
     }

     public function storeEditData(Request $request,$id=null){
        if($request->isMethod('post')){
            $data = $request->all();
            $rules = [
                'title'=>'required',
                'description'=>'required',
            ];
            $cm = [
                'title.required'=>'পোষ্ট টাইটেল যুক্ত করুন',
                'description.required'=>'বিস্তারিত মেসেজ যুক্ত করুন',
            ];
            $this->validate($request,$rules,$cm);
            $post = Post::findOrFail($id);
            $post->title =$data['title'];
            $post->description = $data['description'];
            $post->save();
            Toastr::success('ডাটা সঠিকভাবে আপডেট হয়েছে', 'সাকসেস', ["positionClass" => "toast-top-right","closeButton"=> true,"progressBar"=> true,]);
            return redirect('/show-data');
        }
     }

     //delete data
     public function deleteData ($id=null) {
        Post::findOrFail($id)->delete();
        Toastr::success('ডাটা সঠিকভাবে ডিলিট হয়েছে', 'ডিলিট', ["positionClass" => "toast-top-right","closeButton"=> true,"progressBar"=> true,]);
            return redirect()->back();
            
     }

     public function restoreData ($id) {
        Post::withTrashed()->findOrFail($id)->restore();
        Toastr::success('ডাটা সঠিকভাবে রিস্টোর  হয়েছে', 'ডিলিট', ["positionClass" => "toast-top-right","closeButton"=> true,"progressBar"=> true,]);
            return redirect()->back();
     }

     public function permanentDeleteData ($id=null) {
        Post::onlyTrashed()->findOrFail($id)->forceDelete();
        Toastr::success('ডাটা ডিলিট হয়েছে', 'ডিলিট', ["positionClass" => "toast-top-right","closeButton"=> true,"progressBar"=> true,]);
        return redirect()->back();
        }

        // Change-Status
        public function changeStatus($id) {
            $getStatus = Post::select('status')->where('id',$id)->first();
            if($getStatus->status==1) {
                $status = 0;
            } else {
                $status = 1;
            }
            Post::where('id',$id)->update(['status'=>$status]);
            Toastr::success('স্ট্যাটাস সঠিকভাবে চেন্জ হয়েছে ', 'স্ট্যাটাস', ["positionClass" => "toast-top-right","closeButton"=> true,"progressBar"=> true,]);
            return redirect()->back();
            }
        }



        

