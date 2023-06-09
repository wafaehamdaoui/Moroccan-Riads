<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Reveiw;
use App\Models\Category;

class RoomController extends Controller{
    
    public function index(){
        $viewData = [];
        $viewData["title"] = "Rooms - Morrocan Riads";
        $viewData["subtitle"] = "List of  Rooms";
        $viewData["rooms"] =  Room::all();
        return view('room.index')->with("viewData", $viewData);
    }
    public function show($id){
        $room = Room::findOrFail($id);
        $title = $room["category"]["name"]." - Morrocan Riads ";
        $subtitle= $room["category"]["name"]." - Room information";
        return view('room.show')->with("room", $room)->with("title", $title)->with("subtitle", $subtitle);
    }
    public function findByCategory($categoryName){
        $viewData = [];
        $viewData["title"] = "Rooms - Morrocan Riads";
        $viewData["categoryName"] = $categoryName;
        $viewData["subtitle"] = "List of Rooms";
        $viewData["rooms"] =  Room::join('categories', 'rooms.category_id', '=', 'categories.id')
        ->where('categories.name', $categoryName)
        ->get(['rooms.*']);
        return view('room.find')->with("viewData", $viewData);
    }
    
    public function AvailableRooms(Request $request
    ){
        $checkOutDate=($request->input('checkin'));
        $checkInDate=($request->input('checkout'));
        $viewData = [];
        $viewData["title"] = "Available Room - Moroccan Riads";
        $availableRooms = Room::where('status', 'Available')
        ->whereDoesntHave('bookings', function ($query) use ($checkInDate, $checkOutDate) {
            $query->where(function ($query) use ($checkInDate, $checkOutDate) {
                $query->whereBetween('check_in_date', [$checkInDate, $checkOutDate])
                    ->orWhereBetween('check_out_date', [$checkInDate, $checkOutDate])
                    ->orWhere(function ($query) use ($checkInDate, $checkOutDate) {
                        $query->where('check_in_date', '<=', $checkInDate)
                            ->where('check_out_date', '>=', $checkOutDate);
                    });
            });
        })
        ->get();
    
        $viewData["rooms"] = $availableRooms;
        return view('room.available')->with("viewData", $viewData);
    }
}