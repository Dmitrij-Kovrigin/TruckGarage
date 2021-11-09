<?php

namespace App\Http\Controllers;

use App\Models\Mechanic;
use App\Models\Truck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TruckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $select = '';
        if ($request->sort && $request->sort == 'by_maker') {
            $trucks = Truck::orderBy('maker')->get();
            $select = 'by_maker';
        } elseif ($request->sort && $request->sort == 'by_year') {
            $trucks = Truck::orderBy('make_year', 'desc')->get();
            $select = 'by_year';
        } elseif ($request->sort && $request->sort == 'by_mechanic') {
            $trucks = Truck::orderBy('mechanic_id')->get();
            $select = 'by_mechanic';
        } else {
            $trucks = Truck::orderBy('updated_at', 'desc')->get();
        }



        return view('trucks.trucks', [
            'trucks' => $trucks,
            'select' => $select
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mechanics = Mechanic::all();

        return view('trucks.create', [
            'mechanics' => $mechanics,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Truck $truck)
    {
        $validator = Validator::make($request->all(), [
            'truck_maker' => 'required|max:100|min:2',
            'truck_plate' => 'required|max:20|min:5',
            'truck_year' => 'required|integer',
            'mechanic_id' => 'required|integer|min:1'
        ], [
            'mechanic_id.min' => 'Please, select mechanic!'
        ]);

        $request->flash();

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator);
        }


        $truck = new Truck();
        $truck->maker = $request->truck_maker;
        $truck->plate = $request->truck_plate;
        $truck->make_year = $request->truck_year;
        $truck->mechanic_notices = $request->mechanic_notices;
        $truck->mechanic_id = $request->mechanic_id;

        $truck->save();

        return redirect()->route('trucks')->with('success_message', 'New truck added to list.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function show(Truck $truck)
    {
        return view('trucks.show', [
            'truck' => $truck,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Truck $truck)
    {
        $mechanics = Mechanic::all();
        return view('trucks.edit', [
            'truck' => $truck,
            'mechanics' => $mechanics
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Truck $truck)
    {
        $validator = Validator::make($request->all(), [
            'truck_maker' => 'required|max:100|min:2',
            'truck_plate' => 'required|max:20|min:5',
            'truck_year' => 'required|integer',
            'mechanic_id' => 'required|integer|min:1'
        ], [
            'mechanic_id.min' => 'Please, select mechanic!'
        ]);

        $request->flash();

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator);
        }


        // $truck = new Truck();
        $truck->maker = $request->truck_maker;
        $truck->plate = $request->truck_plate;
        $truck->make_year = $request->truck_year;
        $truck->mechanic_notices = $request->mechanic_notices;
        $truck->mechanic_id = $request->mechanic_id;

        $truck->save();

        return redirect()->route('trucks')->with('success_message', 'Truck edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Truck $truck)
    {
        $truck->delete();
        if ($request->return && $request->return == 'back') {
            return redirect()->back()->with('success_message', 'The book was deleted.');
        }
        return redirect()->route('trucks')->with('success_message', 'The truck was deleted.');
    }
}
