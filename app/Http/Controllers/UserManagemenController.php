<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class UserManagemenController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')
                ->withErrors([
                    'email' => 'Please login to access the dashboard.',
                ])->onlyInput('email');
        }

        $userss = User::get();

        return view('user-managemen.index')->with('users', $userss);
    }

    public function edit($id){
        $users = User::find($id);
        return view('user-managemen.edit', compact('users'));
    }

    public function update(Request $request, $id){
        $photos = User::find($id);
        File::delete(public_path() ."/storage/photos/original/".$photos->photo);
        File::delete(public_path() ."/storage/photos/square/".$photos->photo);
        File::delete(public_path() ."/storage/photos/thumbnail/".$photos->photo);
        $request->validate([
            'name' => 'required|string|max:250',
            'photo' => 'image|nullable|max:1999'
        ]);

        if ($request->hasFile('photo')){
            $photo = $request->file('photo');
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $filenameOriginal = $filename . '_' . time() . '.' . $extension;

            $path = $request->file('photo')->storeAs('photos/original', $filenameOriginal);
            
            $thumbnailPath = public_path('storage/photos/thumbnail/' . $filenameOriginal);
            Image::make($photo)
                ->fit(100, 100)
                ->save($thumbnailPath);

            $squarePath = public_path('storage/photos/square/' . $filenameOriginal);
            Image::make($photo)
                ->fit(200, 200)
                ->save($squarePath);

            $path = $filenameOriginal;
        };

        $photos->update([
            'name'=> $request->name,
            'photo' => $path
        ]);
        return redirect()->route('managemenUser');
    }

    public function destroy($id){
        $photos = User::find($id);
        File::delete(public_path() ."/storage/photos/original/".$photos->photo);
        File::delete(public_path() ."/storage/photos/square/".$photos->photo);
        File::delete(public_path() ."/storage/photos/thumbnail/".$photos->photo);
        $photos->delete();
        return redirect()->route('managemenUser');
    }
}
