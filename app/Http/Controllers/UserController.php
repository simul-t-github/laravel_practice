<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Routing\Middleware\ThrottleRequests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\RateLimiter;

class UserController extends Controller
{
    public function LoginForm()
    {
        return view('login', ['title' => 'User Login']);
    }

    public function dashboard()
    {
        return view('dashboard', ['title' => 'User Dashboard']);
    }

    public function profile($id)
    {
        $user = User::find($id);
        return view('profile', ['title' => 'User Profile', 'user' => $user]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'min:8|required',
        ]);

        Limit::perMinutes(120, 3);


        // Send message...
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect(route('dashboard'));
        } else {
            return redirect()->back();
        }
    }



    public function register()
    {
        return view('register', ['title' => 'User Register']);
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'min:8|required_with:confirm_password|same:confirm_password',
        ]);

        $user = new User;

        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $created = $user->save();

        if ($created == true) {
            return  redirect(route('dashboard'));
        } else {
            return redirect()->back();
        }
    }

    public function user_update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'min:8|required_with:confirm_password|same:confirm_password',
        ]);

        $id = $request['id'];

        $data = [
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['passowrd'])
        ];

        $updated = DB::table('users')->where('id', $id)->update($data);
        if ($updated == true) {
            return  redirect(route('dashboard'));
        } else {
            return redirect()->back();
        }
    }


    public function UserLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
