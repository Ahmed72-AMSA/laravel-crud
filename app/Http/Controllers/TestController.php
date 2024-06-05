<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller   //StudlyCase
{
function bookAction(){  //camelCase
$name = "ahmed";
$books = ["html","css","js"];
return view("test",["name"=>$name , "books"=>$books]);
}

function greetingAction() {
    return "Hello Ahmed";
}
}
