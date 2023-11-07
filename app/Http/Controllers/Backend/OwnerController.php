<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Owner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BookArea;
use Intervention\Image\Facades\Image;

class OwnerController extends Controller
{
    public function allOwner()
    {
        $owner = Owner::latest()->get();

        return view('backend.owner.all_owner', compact('owner'));
    }

    public function addOwner()
    {
        return view('backend.owner.add_owner');
    }

    public function ownerStore(Request $request)
    {
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(550, 670)->save('upload/owner/'.$name_gen);
        $save_url = 'upload/owner/'.$name_gen;

        Owner::insert([
            'image' => $save_url,
            'name' => $request->name,
            'homestay' => $request->homestay,
            'instagram' => $request->instagram,
            'facebook' => $request->facebook,
            'whatsapp' => $request->whatsapp,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Data Owner homestay berhasil ditambahkan',
            'alert-type' => 'success'
        );

        return redirect()->route('all.owner')->with($notification);
    }

    public function editOwner($id)
    {
        $owner = Owner::findOrFail($id);

        return view('backend.owner.edit_owner', compact('owner'));
    }

    public function updateOwner(Request $request)
    {
        $owner_id = $request->id;
        if ($request->file('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(550, 670)->save('upload/owner/'.$name_gen);
            $save_url = 'upload/owner/'.$name_gen;

            Owner::findOrFail($owner_id)->update([
                'image' => $save_url,
                'name' => $request->name,
                'homestay' => $request->homestay,
                'instagram' => $request->instagram,
                'facebook' => $request->facebook,
                'whatsapp' => $request->whatsapp,
                'created_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Data Owner homestay dengan photo berhasil diperbarui',
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.owner')->with($notification);
        } else {
            Owner::findOrFail($owner_id)->update([
                'name' => $request->name,
                'homestay' => $request->homestay,
                'instagram' => $request->instagram,
                'facebook' => $request->facebook,
                'whatsapp' => $request->whatsapp,
                'created_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Data Owner homestay tanpa photo berhasil diperbarui',
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.owner')->with($notification);
        }
    }

    public function deleteOwner($id)
    {
        $owner = Owner::findOrFail($id);
        $img = $owner->image;
        unlink($img);

        Owner::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Data Owner homestay berhasil dihapus ',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function bookArea()
    {
        $book = BookArea::find(1);

        return view('backend.book_area.index', compact('book'));
    }

    public function bookAreaUpdate(Request $request)
    {
        $book_id = $request->id;

        if ($request->file('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1000, 1000)->save('upload/book_area/'.$name_gen);
            $save_url = 'upload/book_area/'.$name_gen;

            BookArea::findOrFail($book_id)->update([
                'image' => $save_url,
                'short_title' => $request->short_title,
                'main_title' => $request->main_title,
                'short_desc' => $request->short_desc,
                'link_url' => $request->link_url,
            ]);

            $notification = array(
                'message' => 'Data Book Area dengan photo berhasil diperbarui',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);
        } else {
            BookArea::findOrFail($book_id)->update([
                'short_title' => $request->short_title,
                'main_title' => $request->main_title,
                'short_desc' => $request->short_desc,
                'link_url' => $request->link_url,
            ]);

            $notification = array(
                'message' => 'Data Book Area tanpa photo berhasil diperbarui',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);
        }
    }
}
