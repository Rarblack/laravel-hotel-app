<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Price;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PricesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Hotel $hotel, Room $room){

        $prices = DB::table('prices')->where('room_id', $room->id)->get();

        return view('prices.index', compact('hotel', 'room', 'prices'));
    }

    public function create(Hotel $hotel, Room $room){

        return view('prices.create', compact('hotel', 'room'));
    }

    public function store(Hotel $hotel, Room $room)
    {
        $data = request()->validate([
            'amount' => 'required|numeric',
            'currency' => 'required|alpha',
            'date' => 'required|date|after:today',
        ]);

        $convertedDate = date('d-m-yy', strtotime($data['date']));

        $currency = strtolower($data['currency']);

        Price::create([
            'room_id' => $room->id,
            'amount' => $data['amount'],
            'currency' => $currency,
            'date' => $convertedDate
        ]);

        return redirect()->route('prices.index', [
            'hotel' => $hotel,
            'room' => $room
        ]);

    }

    public function show(Hotel $hotel, Room $room, Price $price){

        return view('prices.show', compact('hotel', 'room', 'price'));
    }


}
