<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Blog;
use App\Models\Review;
use App\Models\Service;
use App\Models\Booking;
use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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
    public function booking(Request $request , $id)
    {
        $request->validate([
            "checkin" => "required",
            "checkout" => "required",
            'guest' => 'required',
        ]);
        $newBooking = new Booking();
        $newBooking->setCheckIn($request->input('checkin'));
        $newBooking->setCheckOut($request->input('checkout'));
        $newBooking->setGuests($request->input('guest'));
        $newBooking->setStatus('unpayed');
        $newBooking->setTotalPrice(0);
        $newBooking['room_id']=$id;
        $newBooking['user_id']=auth()->user()->getId();
        $newBooking->save();
        $checkIn = \Carbon\Carbon::createFromFormat('Y-m-d', $newBooking->getCheckIn());
        $checkOut = \Carbon\Carbon::createFromFormat('Y-m-d', $newBooking->getCheckOut());
        $bookingDuration = $checkIn->diffInDays($checkOut);
        $newBooking->setTotalPrice($newBooking["room"]->getPrice()*$bookingDuration);
        $newBooking->save();
        
        return redirect()->route('yourReservations');
    }
    public function yourReservations(){
        $viewData = [];
        $viewData["title"] = "Your Reservations - Moroccan Riads";
        $viewData["bookings"] =  Booking::where('user_id',auth()->user()->getId())->get();
        return view('room.yourReservations')->with("viewData", $viewData);
    }
}
