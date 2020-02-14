<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class RoomsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Hotel $hotel){

        $rooms = DB::table('rooms')->where('hotel_id', $hotel->id)->get();

        return view('rooms.index', compact('hotel', 'rooms'));
    }
    public function create(Hotel $hotel){

        return view('rooms.create', compact('hotel'));
    }

    public function store(Hotel $hotel){

        $data = request()->validate([
            'name' => 'required',
            'description' => '',
            'number' => 'required|numeric',
            'image' => 'required|image',
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1500,1000);

        $image->save();

        Room::create([
            'hotel_id' => $hotel->id,
            'name' => $data['name'],
            'description' => $data['description'],
            'number' => $data['number'],
            'image' => $imagePath,

        ]);

        return redirect()->route('rooms.index', [
            'hotel'=> $hotel,
            ]);
    }

    public function show(Hotel $hotel, Room $room){

        $prices = DB::table('prices')->where('room_id', $room->id)->get();

        return view('rooms.show', compact('hotel', 'room', 'prices'));
    }

}
