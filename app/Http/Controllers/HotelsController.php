<?php

namespace App\Http\Controllers;

use App\Feature;
use App\Hotel;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use phpDocumentor\Reflection\Types\Null_;
use PhpOption\None;

class HotelsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()

    {
        $name = strtolower(request()->get('name'));
        $city = strtolower(request()->get('city'));
        $country = strtolower(request()->get('country'));
        $feature = strtolower(request()->get('feature'));


        if($feature != '') {
            $hotels = DB::table('hotels')
                ->join('features', 'hotels.id', '=', 'features.hotel_id')
                ->select('hotels.*', 'features.name')
                ->where([
                    ['hotels.name', 'like', '%' . $name . '%'],
                    ['city', 'like', '%' . $city . '%'],
                    ['country', 'like', '%' . $country . '%'],
                    ['features.name', 'like', '%' . $feature . '%'],
                ])->get();
        }else{
            $hotels = DB::table('hotels')
                ->where([
                    ['hotels.name', 'like', '%' . $name . '%'],
                    ['city', 'like', '%' . $city . '%'],
                    ['country', 'like', '%' . $country . '%'],
                ])->get();
        }

        return view('hotels.index', compact('hotels') );
    }

    public function create(){

        return view('hotels.create');
    }

    public function store(){

        $data = request()->validate([
            'name' => 'required',
            'description' => '',
            'city' => 'required',
            'country' => 'required',
            'image' => 'required|image',
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1500,1000);
        $image->save();

        $name = strtolower($data['name']);
        $city = strtolower($data['city']);
        $country = strtolower($data['country']);

        Hotel::create([
            'name' => $name,
            'description' => $data['description'],
            'city' => $city,
            'country' => $country,
            'image' => $imagePath,

        ]);

        return redirect('/hotels');
    }

    public function show(Hotel $hotel){

        $rooms = DB::table('rooms')
            ->where([
                ['hotel_id', $hotel->id],
                ['available', true],
            ])
            ->get();

        $features = DB::table('features')
            ->where('hotel_id', $hotel->id)
            ->orderBy('created_at', 'desc')
            ->get();


        return view('hotels.show', compact('hotel', 'rooms', 'features'));
    }

}
