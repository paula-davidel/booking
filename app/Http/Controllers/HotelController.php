<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;

class HotelController extends Controller
{
    public function index() {
        $hotels = Hotel::all();
        return view('hotels')->with('hotels', $hotels);
    }
}