<?php

namespace App\Http\Controllers\Auth;

use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\facades\Auth;
use Illuminate\Support\facades\Hash;
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

        User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
            'photo' => $path
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
}

