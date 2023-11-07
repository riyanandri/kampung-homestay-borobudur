<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\RoomType;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    public function roomTypeList()
    {
        $allData = RoomType::orderBy('id', 'desc')->get();
        
        return view('backend.room_type.list', compact('allData'));
    }

    public function addRoomType()
    {
        return view('backend.room_type.add');
    }

    public function roomTypeStore(Request $request)
    {
        $room_type_id = RoomType::insertGetId([
            'name' => $request->name,
            'created_at' => Carbon::now(),
        ]);

        Room::insert([
            'room_type_id' => $room_type_id,
        ]);

        $notification = array(
            'message' => 'Data Tipe Room berhasil diperbarui',
            'alert-type' => 'success'
        );

        return redirect()->route('room.type.list')->with($notification);
    }
}
