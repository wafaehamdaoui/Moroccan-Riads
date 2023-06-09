<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index(){
        $viewData = [];
        $viewData["title"] = "Blogs - Morrocan Riads";
        $viewData["subtitle"] = "List of Blogs";
        $viewData["blogs"] =  Blog::all();
        return view('blog.index')->with("viewData", $viewData);
    }
    public function show($id){
        $room = Room::findOrFail($id);
        $title = $room["category"]["name"]." - Morrocan Riads";
        $subtitle= $room["category"]["name"]." - Room information";
        return view('room.show')->with("room", $room)->with("title", $title)->with("subtitle", $subtitle);
    }
}
