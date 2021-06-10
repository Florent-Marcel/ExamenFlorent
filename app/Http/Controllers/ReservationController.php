<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        if(Auth::user()->isAdmin()){
            $reservations=Reservation::All();
        }else{
            $reservations=Reservation::where('user_id', '=', Auth::user()->id)->get();
        }

        return view('reservation.index',[
            'reservations'=> $reservations,
            'resource'=> 'reservations'
            ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $reservation = Reservation::find($id); // Ajout B
        return view('reservation.show', [
            'reservation' => $reservation,
            ]); // Ajout B
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        //$reservation = Reservation::find($id)
        //return view('reservation.edit',['reservation' => $reservation]);
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
        //
        $validated = $request -> validate([

        ]);

    }

    public function book(Request $request, $id)
    {
        $check = Reservation::where(
            ['representation_id' => $id,
            'user_id' => Auth::user()->id,
            ]);

        if ($check->count() <1 )
        {
            $var = Reservation::create([
                'representation_id' => $id,
                'user_id' => Auth::user()->id,
                'places' => $request->input('places')
            ]);

            return view('reservation.show',[
               'reservation'  => $var,
            ]);
        }
        else{
            return view('reservation.show',[

            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
