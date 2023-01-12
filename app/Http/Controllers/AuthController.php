<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function register () {
        $categories = Category::all();

        return view ('guest.register', ['categories'=>$categories]);
    }

    public function login () {
        $categories = Category::all();
        return view ('guest.login', ['categories'=>$categories]);
    }

    public function registercheck(Request $request) {
        $validate = $request->validate([
            'name' => 'required|string|min:5',
            'username' => 'required|string|min:5|unique:users',
            'email' => 'required|email:rfc,dns|unique:users',
            'phone'=>'required|integer',
            'password'=>'required|alpha_num|min:8',
            'confpassword'=>'required|same:password',
            'date_of_birth' => 'required|date|after:01-01-1900|before:today',
            'gender' => 'required',
            'address'=> 'required'
        ]);

        if($request->phone[0] == '+' or $request->phone[0] == '-') {
            return redirect()->back()->withErrors('The phone must be an integer.')
            ->withInput($request->only('name', 'username', 'email', 'date_of_birth', 'gender', 'address'));
        }

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = '+62'.$request->phone;
        $user->gender = $request->gender;
        $user->DOB = $request->date_of_birth;
        $user->address = $request->address;
        $user->role = 'Customer';

        $user->save();
        Session::flash('message', 'Registration Succesful');
        return redirect('/login');
    }

    public function logincheck(Request $request) {
        $request->validate([
            'email' => 'required|email:rfc,dns|exists:users,email',
            'password' => 'required'
        ]);
        $rememberMe = true;
        if ($request->remember == null) {
            $rememberMe = false;
        }

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            Session::flash('message', 'Login Successful');
            Session::put('email', $request->email);
            Session::put('password', $request->password);
            Session::put('name', Auth::user()->name);
            if($rememberMe == true) {
                Cookie::queue('last_email', $request->email, 120);
                Cookie::queue('last_password', $request->password, 120);
            }

            if (Auth::user()->role == 'Admin') {
                return redirect()->intended('/manage');
            }
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
            'password' => 'The provided credentials do not match our records.'
        ])->onlyInput('email', 'password');
    }

    public function logout()
    {
        session()->flush();
        Auth::logout();

        return redirect('login');
    }

    public function profile()
    {
        $categories = Category::all();

        return view('all.profile', ['categories' => $categories]);
    }

    public function editProfile()
    {
        $categories = Category::all();

        return view('all.editProfile', ['categories' => $categories]);
    }

    public function changeProfile(User $user, Request $request)
    {
        $users = User::all();
        $validate = $request->validate([
            'name' => 'required|string|min:5',
            'username' => 'required|string|min:5',
            'email' => 'required|email:rfc,dns',
            'date_of_birth' => 'required|date|after:01-01-1900|before:today',
            'phone'=>'required|integer',
            'address'=> 'required'
        ]);

        foreach($users as $us) {
            if($user->id != $us->id) {
                if($request->username == $us->username) {
                    return redirect()->back()->withErrors('The username has already been taken.')
                        ->withInput($request->only('name', 'email', 'date_of_birth', 'phone', 'address'));
                }
                if($request->email == $us->email) {
                    return redirect()->back()->withErrors('The email has already been taken.')
                        ->withInput($request->only('name', 'username', 'date_of_birth', 'phone', 'address'));
                }
            }
        }



        if($request->phone[0] == '+' or $request->phone[0] == '-') {
            return redirect()->back()->withErrors('The phone must be an integer.')
            ->withInput($request->only('name', 'username', 'email', 'date_of_birth', 'address'));
        }

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = '+62'.$request->phone;
        $user->DOB = $request->date_of_birth;
        $user->address = $request->address;

        $user->save();
        return redirect('/profile');
    }

    public function passwordRequest() {
        $categories = Category::all();
        return view('user.forgetPasswordInitial', ['categories' => $categories]);
    }

    public function passwordEmail(Request $request) {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function passwordReset($token) {
        $categories = Category::all();
        return view('user.forgetPassword', ['token' => $token, 'categories' => $categories]);
    }

    public function passwordUpdate(Request $request) {
        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required|min:8|confirmed',
        // ]);
        // dd($request);
        $status = Password::reset(
            $request->only('email', 'password', 'password-conf', 'token'),
            function ($user, $password) {

                $user->forceFill([
                    'password' => Hash::make($password)
                ]);

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
