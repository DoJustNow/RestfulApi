<?php

namespace App\Http\Controllers;

use App\Room;
use http\Env\Response;
use Illuminate\Http\Request;

class RoomApiController extends Controller
{

    private $token = 'qwe';

    //Возврат "ВСЕХ" (максимум 100) записей в json
    public function index(Request $request)
    {
        $count       = $request->count;
        $accessToken = $request->access_token;
        if ($accessToken !== $this->token) {
            return response()->json(['error' => 'Failed: no access_token']);
        }
        if ($count > 100) {
            $count = 100;
        } elseif ($count <= 0) {
            $count = 1;
        }
        $rooms = Room::take($count)->orderBy('id', 'desc')->get();

        return response()->json($rooms);
    }

    //Показ одной записи по ID
    public function show(Request $request)
    {
        $roomId      = $request->id;
        $accessToken = $request->access_token;
        if ($accessToken !== $this->token) {
            return response()->json(['error' => 'Failed: no access_token']);
        }
        if ( ! is_numeric($roomId) || $roomId <= 0) {
            return response()->json(['error' => 'Incorrect id']);
        }

        $room = Room::find($roomId);

        return response()->json($room);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $floor       = $request->floor;
        $roomId      = $request->id;
        $cntPeople   = $request->cnt_people;
        $accessToken = $request->access_token;
        if ($accessToken !== $this->token) {
            return response()->json(['error' => 'Failed: no access_token']);
        }
        if ( ! is_numeric($floor) || $floor < 1) {
            return response()->json(['error' => 'Incorrect floor number']);
        }
        if ( ! is_numeric($cntPeople) || $cntPeople < 1) {
            return response()->json(['error' => 'Incorrect cnt_people']);
        }
        if ( ! is_numeric($roomId) || $roomId <= 0) {
            return response()->json(['error' => 'Incorrect id']);
        }
        if (Room::find($roomId)) {
            return response()->json(['error' => 'Failed: room already exists']);
        }
        $room = new Room([
            'id'         => $roomId,
            'floor'      => $floor,
            'cnt_people' => $cntPeople,
        ]);
        $room->save();

        return response()->json($room);
    }

    public function update(Request $request)
    {
        $floor       = $request->floor;
        $roomId      = $request->id;
        $cntPeople   = $request->cnt_people;
        $accessToken = $request->access_token;
        if ($accessToken !== $this->token) {
            return response()->json(['error' => 'Failed: no access_token']);
        }
        if ( ! is_numeric($floor) || $floor < 1) {
            return response()->json(['error' => 'Incorrect floor number']);
        }
        if ( ! is_numeric($cntPeople) || $cntPeople < 1) {
            return response()->json(['error' => 'Incorrect cnt_people']);
        }
        if ( ! is_numeric($roomId) || $roomId <= 0) {
            return response()->json(['error' => 'Incorrect id']);
        }
        $room = Room::find($roomId);
        if ( ! $room) {
            return response()->json(['error' => 'Failed: room not exists']);
        }
        $room->update([
            'floor'      => $floor,
            'cnt_people' => $cntPeople,
        ]);

        return response()->json($room);
    }

    public function delete(Request $request)
    {
        $roomId      = $request->id;
        $accessToken = $request->access_token;
        if ($accessToken !== $this->token) {
            return response()->json(['error' => 'Failed: no access_token']);
        }
        if ( ! is_numeric($roomId) || $roomId <= 0) {
            return response()->json(['error' => 'Incorrect id']);
        }
        $room = Room::find($roomId);
        if ( ! $room) {
            return response()->json(['error' => 'Failed: room not exists']);
        }
        $room->delete();

        return response()->json(null, 204);

    }
}
