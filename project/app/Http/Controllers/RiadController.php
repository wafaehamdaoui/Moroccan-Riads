<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Riad;
use App\Models\Room;
use App\Models\Reveiw;
class RiadController extends Controller{
    
    public function index(){
        $viewData = [];
        $viewData["title"] = "Riads - Moroccan Riads ";
        $viewData["subtitle"] = "List of Riads";
        $viewData["riads"] =  Riad::all();
        return view('riad.index')->with("viewData", $viewData);
    }
    public function show($id){
        $room = Room::findOrFail($id);
        $title = $room["category"]["name"]." - Online Booking";
        $subtitle= $room["category"]["name"]." - Room information";
        return view('room.show')->with("room", $room)->with("title", $title)->with("subtitle", $subtitle);
    }
}