<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room as Room;
use App\Client as Client;
use App\Reservation as Reservation;

class ReservationsController extends Controller
{


    function index($client_id, Request $request)
    {

        $dateFrom = $request->input("dateFrom");
        $dateTo = $request->input("dateTo");
        
        $client = new Client();
        $room = new Room();

        $data = [];
        $data['dateFrom'] = $dateFrom;
        $data['dateTo'] = $dateTo;
        $data['rooms'] = $room->getAvailableRooms($dateFrom, $dateTo);
        $data['client'] = $client->find($client_id);

        return $data;
        //return view('reservations/index', $data );
    }

    function bookRoom(  $client_id, 
                        $room_id, 
                        $date_in, 
                        $date_out )
    {
        $reservation = new Reservation();
        $client_instance = new Client();
        $room_instance = new Room();

        $client = $client_instance->find($client_id);
        $room = $room_instance->find($room_id);
        
        $reservation->date_in = $date_in;
        $reservation->date_out = $date_out;
        $reservation->room()->associate($room);
        $reservation->client()->associate($client);

        $room_availability = $room->getRoomAvailability($room_id, $date_in, $date_out);

        if( !$room_availability )
        {
            $reservation->save();
        }else
        {
            abort(405, 'Trying to book an already booked room');
        }

        return [ 'booked' => true ];
        //return redirect()->route('clients');
    }
}
