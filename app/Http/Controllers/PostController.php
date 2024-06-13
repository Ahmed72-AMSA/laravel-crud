<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    function index(){
    $allPosts = [
    ['id'=>1 , 'title'=>'php' , 'postedBy'=>'Ahmed','createdAt'=>date('Y-m-d H:i:s')],
    ['id'=>2 , 'title'=>'laravel', 'postedBy'=>'Mohammed','createdAt'=>date('Y-m-d H:i:s')],
    ];

        return view("posts.index",['posts'=>$allPosts]);
    }



function show($postId){
    $singlePost = ['id'=>1 , 'title'=>'php' , 'postedBy'=>'Ahmed','createdAt'=>date('Y-m-d H:i:s') , 'description' => 'this is my php blog'];


    return view("posts.show",['post'=>$singlePost]);
}

function create(){
return view("posts.create");
}


function store(){
// $data = $_POST;
$data = request()->all();

return to_route("posts.index");

}

function edit(){
$data = request()->all();

return view("posts.edit");
}

}


