<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\Facility;
use Carbon\CarbonPeriod;
use App\Models\MultiImage;
use Illuminate\Http\Request;
use App\Models\RoomBookedDate;
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

    public function bookingSearch(Request $request)
    {
        $request->flash();

        if ($request->check_in == $request->check_out) {

            $notification = array(
                'message' => 'Ada sesuatu yang salah, silahkan coba lagi!',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }

        $sdate = date('Y-m-d',strtotime($request->check_in));
        $edate = date('Y-m-d',strtotime($request->check_out));
        $alldate = Carbon::create($edate)->subDay();
        $d_period = CarbonPeriod::create($sdate,$alldate);
        $dt_array = [];
        foreach ($d_period as $period) {
           array_push($dt_array, date('Y-m-d', strtotime($period)));
        }

        $check_date_booking_ids = RoomBookedDate::whereIn('book_date',$dt_array)->distinct()->pluck('booking_id')->toArray();

        $rooms = Room::withCount('roomNumbers')->where('status',1)->get();

        return view('frontend.room.search_room',compact('rooms','check_date_booking_ids'));

    }
}
