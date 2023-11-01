<?php

namespace App\Http\Controllers;

use App\Models\Photo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    public function index()
    {
        $photo = Photo::all();
        return view('photos.index', [
            "title" => "Photo Uploads",
            "photos" => $photo,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/galeri'), $imageName, 'public');
        } else {
            return redirect()->back()->with('error', 'Please select an image to upload.');
        }

        $photo = new Photo();
        $photo->gambar_name = $request->input('name');
        $photo->image = $imageName;
        $photo->status = 'draft';
        $photo->save();

        return redirect()->back()->with('sukses', 'Photo uploaded successfully');
    }

    public function publish($id)
    {
        $photo = Photo::find($id);

        if (!$photo) {
            return redirect()->back()->with('error', 'Photo not found.');
        }

        if ($photo->status === 'publish') {
            return redirect()->back()->with('error', 'Photo is already published.');
        }

        $photo->status = 'publish';
        $photo->save();

        return redirect()->back()->with('success', 'Photo has been published.');
    }


    public function destroy(Photo $photo)
    {
        $imageName = $photo->gambar;
        $photo->delete();
        if (!empty($imageName)) {
            if (Storage::exists('storage/galeri' . $imageName)) {
                Storage::delete('storage/galeri' . $imageName);
            }
        }
        return redirect()->route('photos')->with('sukses', 'Postingan berhasil dihapus.');
    }
}
