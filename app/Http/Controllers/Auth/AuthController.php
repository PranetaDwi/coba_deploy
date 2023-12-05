<?php

namespace App\Http\Controllers\Auth;

use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use App\Jobs\SendMailJob;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class AuthController extends Controller
{
    public function __construct(){
        $this->middleware('guest')->except(['logout', 'dashboard']);
    }
    public function register(){
        return view('auth.register');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed',
            'photo' => 'image|nullable|mimes:jpg,png,jpeg|max:2048'
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
        

        User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
            'photo' => $filenameSimpan
        ]);

        $content = [
            'name'=> $request->name,
            'email' => $request->email,
            'subject' => "Berhasil Register",
            'body' => "Hai. Selamat datang di Curiculum Vitae Milik Neta. Sekarang, kamu dapat mengaksesnya kapan dan dimanpun. Have a Good Day",
        ];

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        
        Mail::to($content['email'])->send(new SendEmail($content));
        
        return redirect()->route('dashboard')->withSuccess('You have successfully registered & logged in!');
    }

    public function login(){
        return view('auth.login');
    }

    public function authenticate(Request $request){
        $credentials  = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('dashboard')->withSuccess('You have successfully login');
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our record',
        ])->onlyInput('email');
    }

    public function home(){
        if (Auth::check()){
            return view ('cv.dashboard');
        }
        return redirect()->route('login')->withErrors(['email' => 'Please login to access the dashboard'])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->withSuccess('You have logged out successfully');
        
    }
    
    public function createThumbnail($path, $width, $height)
    {
    $img = Image::make($path)->resize($width, $height, function ($constraint) {
        $constraint->aspectRatio();
    });
    $img->save($path);
    }
}

