<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
class BlogController extends Controller
{
    public function index(){
        $post=Post::all(); 
      return view('blog.index',['posts'=>$post]);
    }
    public function show($postid) { 
            $singlepost=Post::where('id',$postid)->first(); 
            
        if (is_null($singlepost)){
            return to_route('blogs.index');
        }

        return view('blog.show',['post'=>$singlepost]);

    }
    public function create(){
        $creatorfromdb=User::all();
        return view('blog.create',['creators'=>$creatorfromdb]);
    }
    public function store(){
        request()->validate([
            'title'=>['required','min:5'],
            'description'=>['required','min:5']
        ]);
        $title=request()->title;
        $description=request()->description;
        $creator=request()->post_creator;
        $row=new Post();
        $row->title=$title;
        $row->description=$description;
        $row->user_id=$creator;
        $row->save();
        return to_route('blogs.index');
    }
    public function edit($postid){
        $usersfromdb=User::all();
        $postdb=Post::find($postid  );
        return view('blog.edit',['postid'=>$postid,'users'=>$usersfromdb,'post'=>$postdb]);
    }
    public function update($postid){
        request()->validate([
            'title'=>['required','min:5'],
            'description'=>['required','min:5']
        ]);
        $title=request()->title;
        $desc=request()->description;
        $creator=request()->post_creator;
        $newpost=Post::find($postid);
        $newpost->title=$title;
        $newpost->description=$desc;
        $newpost->user_id=$creator;
        $newpost->save();
        return to_route('blogs.show',$postid);
    }
    public function destroy($postid){
        $post=Post::find($postid);
        $post->delete();
        return to_route('blogs.index');
    }
}
