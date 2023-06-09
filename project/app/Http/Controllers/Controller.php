<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Room;
use App\Models\Blog;
use App\Models\Review;
use App\Models\Service;
use App\Models\Category;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function index(){
        $viewData = [];
        $viewData["title"] = "Home Page - Moroccan Riads";
        $viewData["rooms"] =  Room::take(6)->get();
        $viewData["categories"] =  Category::all();
        $viewData["reviews"] =  Review::all();
        $viewData["services"] =  Service::all();
        $viewData["blogs"] =  Blog::take(3)->get();
        return view('home.index')->with("viewData", $viewData);
    }
    public function about(){
        $data1 = "About us - Moroccan Riads";
        $data2 = "About us";
        $description = "This is an about page ...";
        $author = "Developed by: Your Name";
        return view('home.about')->with("title", $data1)
        ->with("subtitle", $data2)
        ->with("description", $description)
        ->with("author", $author);
    }

}
