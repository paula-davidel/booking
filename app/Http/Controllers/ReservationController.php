<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Reservation;
use App\Hotel;
use App\Room;
use App\Trip;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $reservations = Reservation::with('room', 'room.hotel')
        ->orderBy('arrival', 'asc')
        ->where('user_id', Auth::id())
        ->get();

      return view('dashboard.reservations')->with('reservations', $reservations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create($hotel_id)
    {
      $hotelInfo = Hotel::with('rooms')->get()->find($hotel_id);

      return view('dashboard.reservationCreate', compact('hotelInfo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {      

      $dataForReservation= [
        'room_id' => $request->room_id,
        'user_id' => Auth::id(),
        'num_of_guests' => $request->num_of_guests,
        'arrival' => $request->arrival,
        'departure' => $request->departure,
      ];
      Reservation::create($dataForReservation);
      
      $room_price = Room::where('id', $request->room_id)->first();

      $dataForTrip = [
        'title' => $request->title,
        'description' => $request->description,
        'start_date' => $request->arrival,
        'end_date' => $request->departure,
        'location' => $request->location,
        'price' => $room_price->price,
      ];

      $slug = Str::slug($request->title, '_');
      $dataForTrip['slug'] =$slug;
      Trip::create($dataForTrip);
      return redirect('dashboard/reservations')->with('success', 'Reservation created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
      $reservation = Reservation::with('room', 'room.hotel')->get()->find($reservation->id);
      $hotel_id = $reservation->room->hotel_id;
      $hotelInfo = Hotel::with('rooms')->get()->find($hotel_id);

      return view('dashboard.reservationSingle', compact('reservation', 'hotelInfo'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
      $reservation = Reservation::with('room', 'room.hotel')->get()->find($reservation->id);
      $hotel_id = $reservation->room->hotel_id;
      $hotelInfo = Hotel::with('rooms')->get()->find($hotel_id);

      return view('dashboard.reservationEdit', compact('reservation', 'hotelInfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
      $reservation->user_id = Auth::id();

      $reservation->save();
      return redirect('dashboard/reservations')->with('success', 'Successfully updated your reservation!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
      $reservation = Reservation::find($reservation->id);
      $reservation->delete(); 

      return redirect('dashboard/reservations')->with('success', 'Successfully deleted your reservation!');
    }
}
