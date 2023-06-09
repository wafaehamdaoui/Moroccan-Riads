<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Room;
use App\Models\Riad;
use App\Models\Review;
use App\Models\service;
use App\Models\Booking;
use App\Models\Category;

class AdminHomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $viewData = [];
        $viewData["title"] = " Admin - Morrocan Riads";
        $bookings = Booking::all();
        $rooms = Room::all();
        $riads = Riad::all();
        $users = User::all();
        $reviews = Review::all();
        $data=[];
        $name=[];
        $bookingCounts = Booking::join('rooms', 'bookings.room_id', '=', 'rooms.id')
        ->join('riads', 'rooms.riad_id', '=', 'riads.id')
        ->selectRaw('riads.name, COUNT(bookings.id) as booking_count')
        ->groupBy('riads.name')
        ->get();

        foreach ($bookingCounts as $bookingCount) {
            $name[] = $bookingCount->name;
            $data[] = $bookingCount->booking_count;
        }

        $viewData["rooms"] = $rooms ;
        $viewData["riads"] = $riads;
        $viewData["users"] = $users;
        $viewData["reviews"] = $reviews;
        $viewData["bookings"] =  $bookings;
        $viewData["data"] = $data ;
        $viewData["name"] = $name ;
        return view('admin.index')->with("viewData", $viewData);
    }
    public function bookings(){
        $viewData = [];
        $viewData["title"] = " Admin -  Bookings - Morrocan Riads";
        $viewData["bookings"] = Booking::all();
        return view('admin.bookings')->with("viewData", $viewData);
    }
    public function deleteBooking($id)
    {
        Booking::destroy($id);
        session()->flash('success', 'Booking deleted successfully!');
        return back();
    }
    public function editBooking($id)
    {
        $viewData = [];
        $viewData["title"] = "Admin - Edit Booking - Morrocan Riads";
        $viewData["booking"] = Booking::findOrFail($id);
        return view('admin.editBooking')->with("viewData", $viewData);
    }
    
    public function updateBooking(Request $request, $id)
    {   
        $booking = Booking::findOrFail($id);
        $booking->setCheckIn($request->input('check_in_date'));
        $booking->setCheckOut($request->input('check_out_date'));
        $booking->setGuests($request->input('guests'));
        $booking->setTotalPrice($request->input('total_price'));
        $booking->setStatus($request->input('payement_status'));
        $booking->save();
        session()->flash('success', 'Booking edited successfully!');

        return redirect()->route('admin.bookings');
    }

    public function riads(){
        $viewData = [];
        $viewData["title"] = " Admin -  Riads - Morrocan Riads";
        $viewData["riads"] = Riad::all();
        return view('admin.riads')->with("viewData", $viewData);
    }
    public function storeRiad(Request $request)
    {
        $request->validate([
            "name" => "required|max:255",
            "description" => "required",
            "ville" => "required",
            'image' => 'image',
        ]);
        $newRiad = new Riad();
        $newRiad->setName($request->input('name'));
        $newRiad->setDescription($request->input('description'));
        $newRiad->setVille($request->input('ville'));
        $newRiad->setImage('riad.jpg');
        $newRiad->save();
        if ($request->hasFile('image')) {
            $imageName = "riad".$newRiad->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put(
            $imageName,
            file_get_contents($request->file('image')->getRealPath())
            );
            $newRiad->setImage($imageName);
            $newRiad->save();
        }
        session()->flash('success', 'Riad added successfully!');

        return redirect()->route('admin.riads');
        
    }

    public function addRiad()
    {
        $viewData = [];
        $viewData["title"] = "Admin - Edit Riad - Morrocan Riads";
        return view('admin.addRiad')->with("viewData", $viewData);
    }

    public function deleteRiad($id)
    {
        Riad::destroy($id);
        session()->flash('success', 'Riad deleted successfully!');
        return back();
    }
    public function editRiad($id)
    {
        $viewData = [];
        $viewData["title"] = "Admin - Edit Riad - Morrocan Riads";
        $viewData["riad"] = Riad::findOrFail($id);
        return view('admin.editRiad')->with("viewData", $viewData);
    }
    
    public function updateRiad(Request $request, $id)
    {   
        $riad = Riad::findOrFail($id);
        $riad->setName($request->input('name'));
        $riad->setDescription($request->input('description'));
        $riad->setVille($request->input('ville'));
        if ($request->hasFile('image')) {
            $imageName = "riad".$riad->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put(
            $imageName,
            file_get_contents($request->file('image')->getRealPath())
            );
            $riad->setImage($imageName);
            }
            

        $riad->save();
        session()->flash('success', 'Riad edited successfully!');

        return redirect()->route('admin.riads');
    }

    public function rooms(){
        $viewData = [];
        $viewData["title"] = " Admin -  Rooms - Morrocan Riads";
        $viewData["rooms"] = Room::all();
        return view('admin.rooms')->with("viewData", $viewData);
    }

    public function storeRoom(Request $request)
    {
        $request->validate([
            "number" => "required|max:255",
            "description" => "required",
            "status" => "required",
            "capacity" => "required",
            "size" => "required",
            "category" => "required",
            "riad" => "required",
            "price" => "required|numeric",
            'image' => 'image',
        ]);
        $newRoom = new Room();
        $newRoom->setNumber($request->input('number'));
        $newRoom->setPrice($request->input('price'));
        $newRoom->setCapacity($request->input('capacity'));
        $newRoom->setSize($request->input('size'));
        $newRoom->setStatus($request->input('status'));
        
        $newRoom["category_id"]=($request->input('category'));
        $newRoom["riad_id"]=($request->input('riad'));

        $newRoom->setDescription($request->input('description'));
        $newRoom->setImage('room.jpg');
        $newRoom->save();
        if ($request->hasFile('image')) {
            $imageName = "room".$newRoom->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put(
            $imageName,
            file_get_contents($request->file('image')->getRealPath())
            );
            $newRoom->setImage($imageName);
            $newRoom->save();
        }
        session()->flash('success', 'Room added successfully!');

        return redirect()->route('admin.rooms');
    }

    public function addRoom()
    {
        $viewData = [];
        $viewData["title"] = "Admin - Add Room - Morrocan Riads";
        $viewData["categories"] = Category::all();
        $viewData["riads"] = Riad::all();
        $viewData["services"] = Service::all();
        return view('admin.addRoom')->with("viewData", $viewData);
    }
    
    public function deleteRoom($id)
    {
        Room::destroy($id);
        session()->flash('success', 'Room deleted successfully!');
        return back();
    }
    public function editRoom($id)
    {
        $viewData = [];
        $viewData["title"] = "Admin - Edit Room - Morrocan Riads";
        $viewData["room"] = Room::findOrFail($id);
        return view('admin.editRoom')->with("viewData", $viewData);
    }
    
    public function updateRoom(Request $request, $id)
    {   
        $room = Room::findOrFail($id);
        $room->setNumber($request->input('number'));
        $room->setPrice($request->input('price'));
        $room->setCapacity($request->input('capacity'));
        $room->setSize($request->input('size'));
        $room->setStatus($request->input('status'));
        $room->setDescription($request->input('description'));
        if ($request->hasFile('image')) {
            $imageName = "room".$romm->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put(
            $imageName,
            file_get_contents($request->file('image')->getRealPath())
            );
            $room->setImage($imageName);
            }
            

        $room->save();
        session()->flash('success', 'Room edited successfully!');

        return redirect()->route('admin.rooms');
    }

    public function categories(){
        $viewData = [];
        $viewData["title"] = " Admin -  Categories - Morrocan Riads";
        $viewData["categories"] = Category::all();
        return view('admin.categories')->with("viewData", $viewData);
    }
    public function addCategory()
    {
        $viewData = [];
        $viewData["title"] = "Admin - Add Category - Morrocan Riads";
        return view('admin.addCategory')->with("viewData", $viewData);
    }
    public function storeCategory(Request $request)
    {
        $request->validate([
            "name" => "required|max:255",
            "description" => "required",
            "size" => "required",
            "price" => "required",
            'image' => 'image',
        ]);
        $newCategory = new Category();
        $newCategory->setName($request->input('name'));
        $newCategory->setSize($request->input('size'));
        $newCategory->setPrice($request->input('price'));
        $newCategory->setDescription($request->input('description'));
        $newCategory->setImage('category.jpg');
        $newCategory->save();
        if ($request->hasFile('image')) {
            $imageName = "category".$newCategory->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put(
            $imageName,
            file_get_contents($request->file('image')->getRealPath())
            );
            $newCategory->setImage($imageName);
            $newCategory->save();
        }
        session()->flash('success', 'Category added successfully!');

        return redirect()->route('admin.categories');
    }

    public function deleteCategory($id)
    {
        Category::destroy($id);
        session()->flash('success', 'Category deleted successfully!');
        return back();
    }
    public function editCategory($id)
    {
        $viewData = [];
        $viewData["title"] = "Admin - Edit Category - Morrocan Riads";
        $viewData["category"] = Category::findOrFail($id);
        return view('admin.editCategory')->with("viewData", $viewData);
    }
    
    public function updateCategory(Request $request, $id)
    {   
        $category = Category::findOrFail($id);
        $category->setName($request->input('name'));
        $category->setDescription($request->input('description'));
        if ($request->hasFile('image')) {
            $imageName = "category".$category->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put(
            $imageName,
            file_get_contents($request->file('image')->getRealPath())
            );
            $category->setImage($imageName);
            }
            

        $category->save();
        session()->flash('success', 'Category edited successfully!');

        return redirect()->route('admin.categories');
    }

    public function users(){
        $viewData = [];
        $viewData["title"] = " Admin -  Users - Morrocan Riads";
        $viewData["users"] = User::all();
        return view('admin.users')->with("viewData", $viewData);
    }
    public function addUser()
    {
        $viewData = [];
        $viewData["title"] = "Admin - Add User - Morrocan Riads";
        return view('admin.addUser')->with("viewData", $viewData);
    }
    public function storeUser(Request $request)
    {
        $request->validate([
            "name" => "required|max:255",
            "email" => "required|max:255",
            'password' => 'required|max:255',
            'role' => 'required|max:255',
        ]);
        $newUser = new User();
        $newUser->setName($request->input('name'));
        $newUser->setEmail($request->input('email'));
        $newUser->setPassword($request->input('password'));
        $newUser->setPassword($request->input('role'));
        $newUser->save();
        session()->flash('success', 'User added successfully!');
        return redirect()->route('admin.users');
    }

    public function deleteUser($id)
    {
        User::destroy($id);
        session()->flash('success', 'User deleted successfully!');
        return back();
    }
    public function editUser($id)
    {
        $viewData = [];
        $viewData["title"] = "Admin - Edit User - Morrocan Riads";
        $viewData["user"] = User::findOrFail($id);
        return view('admin.editCategory')->with("viewData", $viewData);
    }
    
    public function updateUser(Request $request, $id)
    {   
        $user = User::findOrFail($id);
        $user->setName($request->input('name'));
        $user->setEmail($request->input('email'));
        $user->setPassword($request->input('password'));    

        $user->save();
        session()->flash('success', 'User edited successfully!');

        return redirect()->route('admin.users');
    }

    public function reviews(){
        $viewData = [];
        $viewData["title"] = " Admin -  Reviews - Morrocan Riads";
        $viewData["reviews"] = Review::all();
        return view('admin.reviews')->with("viewData", $viewData);
    }

    public function deleteReview($id)
    {
        Review::destroy($id);
        session()->flash('success', 'Review deleted successfully!');
        return back();
    }
    public function services(){
        $viewData = [];
        $viewData["title"] = " Admin - Services - Morrocan Riads";
        $viewData["services"] = Service::all();
        return view('admin.services')->with("viewData", $viewData);
    }
    public function addService()
    {
        $viewData = [];
        $viewData["title"] = "Admin - Add Service - Morrocan Riads";
        return view('admin.addService')->with("viewData", $viewData);
    }
    public function storeService(Request $request)
    {
        $request->validate([
            "name" => "required|max:255",
            "description" => "required",
            'image' => 'image',
        ]);
        $newService = new Service();
        $newService->setName($request->input('name'));
        $newService->setPrice($request->input('price'));
        $newService->setDescription($request->input('description'));
        $newService->save();
        session()->flash('success', 'Service added successfully!');

        return redirect()->route('admin.services');
    }

    
    public function deleteService($id)
    {
        Service::destroy($id);
        session()->flash('success', 'Service deleted successfully!');
        return back();
    }
    public function editService($id)
    {
        $viewData = [];
        $viewData["title"] = "Admin - Edit Service - Morrocan Riads";
        $viewData["room"] = Service::findOrFail($id);
        return view('admin.editRoom')->with("viewData", $viewData);
    }
    
    public function updateService(Request $request, $id)
    {   
        $service = Service::findOrFail($id);
        $service->setName($request->input('name'));
        $service->setPrice($request->input('price'));
        $service->setDescription($request->input('description'));        

        $service->save();
        session()->flash('success', 'Service edited successfully!');

        return redirect()->route('admin.services');
    }

}