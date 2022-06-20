<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return $rooms;
    }
    public function store(Request $request)
    {
        if (!$request->id) {
            $room = new Room([
                'name' => $request->input('name'),
                'booking_date' => $request->input('booking_date'),
                'checkout_date' => $request->input('checkout_date'),
                'nid' => $request->input('nid'),
                'mobile' => $request->input('mobile'),
            ]);
            $room->save();
        } else {
            $room = Room::find($request->id);
            $room->update($request->all());
        }
        $rooms = Room::all();
        return $rooms;
    }
    public function edit($id)
    {
        $room = Room::find($id);
        return $room;
    }
    public function destroy($id)
    {
        $room = Room::find($id);
        $room->delete();
        return response()->json('The room successfully deleted');
    }
}