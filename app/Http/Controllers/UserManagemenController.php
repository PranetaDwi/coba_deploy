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
        File::delete(public_path() ."/storage/posts_image/".$photos->photo);
        $request->validate([
            'name' => 'required|string|max:250',
            'photo' => 'image|nullable|max:1999'
        ]);

        if ($request->hasFile('photo')){
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $basename = uniqid() . time();
            $smallFilename = "small_{$basename}.{$extension}";
            $mediumFilename = "medium_{$basename}.{$extension}";
            $largeFilename = "large_{$basename}.{$extension}";
            $filenameSimpan = "{$basename}.{$extension}";
            $path = $request->file('photo')->storeAs('posts_image', $filenameSimpan);

            $request->file('photo')->storeAs("public/posts_image", $smallFilename);
            $request->file('photo')->storeAs("public/posts_image", $mediumFilename);
            $request->file('photo')->storeAs("public/posts_image", $largeFilename);

            $this->createThumbnail(public_path() . "/storage/posts_image/" . $smallFilename, 150,93);
            $this->createThumbnail(public_path() . "/storage/posts_image/" . $mediumFilename, 300,185);
            $this->createThumbnail(public_path() . "/storage/posts_image/" . $largeFilename, 150,93);
        } else {
            $filenameSimpan = 'noimage.png';
        };

        $photos->update([
            'name'=> $request->name,
            'photo' => $filenameSimpan 
        ]);
        return redirect()->route('managemenUser');
    }

    public function destroy($id){
        $photos = User::find($id);
        File::delete(public_path() ."/storage/posts_image/".$photos->photo);
        $photos->delete();
        return redirect()->route('managemenUser');
    }

    public function createThumbnail($path, $width, $height)
    {
    $img = Image::make($path)->resize($width, $height, function ($constraint) {
        $constraint->aspectRatio();
    });
    $img->save($path);
    }
}
