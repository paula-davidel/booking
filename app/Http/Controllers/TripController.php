<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trip;
use Illuminate\Support\Str;

class TripController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trip = Trip::all();
        return view('trip.index_trip', compact('trip'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trip.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'price' => 'required|numeric',
            'title' => 'required|max:255',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'location' => 'required|max:255',
        ]);
        $slug = Str::slug($storeData['title'], '_');
        $storeData['slug'] =$slug;
        $trip = Trip::create($storeData);

        return redirect('/trips')->with('completed', 'Trip has been saved!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trip = Trip::findOrFail($id);
        return view('trip.edit', compact('trip'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateData = $request->validate([
            'price' => 'required|numeric',
            'title' => 'required|max:255',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'location' => 'required|max:255',
        ]);
        $slug = Str::slug($updateData['title'], '_');
        $updateData['slug'] =$slug;
        Trip::whereId($id)->update($updateData);
        return redirect('/trips')->with('completed', 'Trip has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trip = Trip::findOrFail($id);
        $trip->delete();

        return redirect('/trips')->with('completed', 'Trip has been deleted');
    }
}
