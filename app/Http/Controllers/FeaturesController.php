<?php

namespace App\Http\Controllers;

use App\Feature;
use App\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeaturesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Hotel $hotel){

        $features = DB::table('features')->where('hotel_id', $hotel->id)->get();

        return view('features.index', compact('hotel', 'features'));
    }

    public function create(Hotel $hotel){

        return view('features.create', compact('hotel'));
    }

    public function store(Hotel $hotel){

        $data = request()->validate([
            'name' => 'required',
            'description' => '',
        ]);

        Feature::create([
            'hotel_id' => $hotel->id,
            'name' => $data['name'],
            'description' => $data['description']
        ]);

        return redirect()->route('hotels.show', [
            'hotel'=> $hotel,
        ]);
    }

    public function show(Hotel $hotel, Feature $feature){

        return view('features.show', compact('hotel', 'feature'));
    }

}
