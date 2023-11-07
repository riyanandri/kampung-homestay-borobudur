<?php

namespace App\Http\Controllers\Backend;

use App\Models\Room;
use App\Models\Facility;
use App\Models\MultiImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class RoomController extends Controller
{
    public function editRoom($id)
    {
        $basic_facility = Facility::where('room_id', $id)->get();
        $multi_img = MultiImage::where('room_id', $id)->get();
        $editData = Room::find($id);

        return view('backend.room.edit', compact('editData', 'basic_facility', 'multi_img'));
    }

    public function updateRoom(Request $request, $id){

        $room = Room::find($id);
        $room->room_type_id = $room->room_type_id;
        $room->total_adult = $request->total_adult;
        $room->total_child = $request->total_child;
        $room->room_capacity = $request->room_capacity;
        $room->price = $request->price;

        $room->size = $request->size;
        $room->view = $request->view;
        $room->bed_style = $request->bed_style;
        $room->discount = $request->discount;
        $room->short_desc = $request->short_desc;
        $room->description = $request->description; 
        // Update Single Image 

        if($request->file('image')){ 
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(550,850)->save('upload/room_img/'.$name_gen);
            $room['image'] = $name_gen; 
        }

        $room->save();

        // Update for Facility Table 

        if($request->facility_name == NULL){

            $notification = array(
                'message' => 'Maaf! Tidak ada fasilitas yang dipilih',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);

        } else{
            Facility::where('room_id',$id)->delete();
            $facilities = Count($request->facility_name);
            for($i=0; $i < $facilities; $i++ ){
                $fcount = new Facility();
                $fcount->room_id = $room->id;
                $fcount->facility_name = $request->facility_name[$i];
                $fcount->save();
            } // end for
        } // end else 

        // Update Multi Image 

        if($room->save()){
            $files = $request->multi_img;
            if(!empty($files)){
                $subimage = MultiImage::where('room_id',$id)->get()->toArray();
                MultiImage::where('room_id',$id)->delete();

            }
            if(!empty($files)){
                foreach($files as $file){
                    $imgName = date('YmdHi').$file->getClientOriginalName();
                    $file->move('upload/room_img/multi_img/',$imgName);
                    $subimage['multi_img'] = $imgName;

                    $subimage = new MultiImage();
                    $subimage->room_id = $room->id;
                    $subimage->multi_img = $imgName;
                    $subimage->save();
                }

            }
        } // end if

        $notification = array(
            'message' => 'Data Room berhasil diperbarui',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 
    }

    public function multiImageDelete($id){

        $deletedata = MultiImage::where('id',$id)->first();

        if($deletedata){

            $imagePath = $deletedata->multi_img;

            // Check if the file exists before unlinking 
            if (file_exists($imagePath)) {
               unlink($imagePath);
               echo "Gambar berhasil dihapus";
            }else{
                echo "Gambar tidak ditemukan";
            }

            //  Delete the record form database 

            MultiImage::where('id',$id)->delete();

        }

        $notification = array(
            'message' => 'Galeri berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

    }
}
