<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //
    public function client()
    {
        return $this->belongsTo('App\Client', 'client_id', 'id');
    }

    public function room()
    {
        return $this->belongsTo('App\Room', 'room_id', 'id');
    }

    public function bookRoom(   $client_id, 
                                $room_id, 
                                $date_in, 
                                $date_out )
    {
        /*$this->insert(
            [
                'date_in' => $date_in, 
                'date_out' => $date_out,
                'client_id' => $client_id,
                'room_id' => $room_id
            ]
        );*/
    }

}
