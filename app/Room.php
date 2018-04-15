<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }

    public function getAvailableRooms($date_start, $date_final)
    {

        $available_rooms = DB::table('rooms as r')
                    ->select('r.id', 'r.name')
                    ->whereRaw("
                    r.id NOT IN ( 
                        SELECT b.room_id 
                        FROM reservations b
                        WHERE NOT (
                            b.date_out < '{$date_start}' OR
                            b.date_in > '{$date_final}'
                        )
                    )
                    ")
                    ->orderBy('r.id')
                    ->get();                    

        return $available_rooms;

    }

    public function getRoomAvailability($room_id, $date_start, $date_final)
    {
        $available_rooms = DB::table('reservations')
                    
                    ->whereRaw("
                     NOT (
                            date_out < '{$date_start}' OR
                            date_in > '{$date_final}'
                        )
                        
                    AND room_id = {$room_id}
                    
                    ")
                    ->count()
                    ;                    

        return $available_rooms;
    }

}
