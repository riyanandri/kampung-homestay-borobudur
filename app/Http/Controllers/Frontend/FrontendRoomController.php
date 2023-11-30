<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Room;
use App\Models\Facility;
use App\Models\MultiImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendRoomController extends Controller
{
    public function allRoomList()
    {
        $rooms = Room::latest()->get();
        return view('frontend.room.all_rooms',compact('rooms'));
    }

    public function roomDetailsPage($id)
    {
        $roomDetails = Room::find($id);
        $multiImage = MultiImage::where('room_id',$id)->get();
        $facility = Facility::where('room_id',$id)->get();
        $otherRooms = Room::where('id','!=',$id)->orderBy('id', 'DESC')->limit(2)->get();
        return view('frontend.room.room_details',compact('roomDetails','multiImage','facility','otherRooms'));
    }
}
