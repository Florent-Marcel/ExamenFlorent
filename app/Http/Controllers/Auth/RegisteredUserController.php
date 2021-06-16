<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            //'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|confirmed|min:8|max:255',
            'login' => 'required|string|max:30|unique:users',
            'firstname' => 'required|string|max:60',
            'lastname' => 'required|string|max:60',
            'langue' => 'required|string|max:2',
        ]);

        $user = User::create([
            //'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'login' => $request->login,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'langue' => $request->langue,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function update(Request $request)
    {
        $request->validate([
            //'name' => 'required|string|max:255',
            'email' => ['required',
                        'string',
                        'email',
                        'max:100',
                        Rule::unique('users')->ignore(Auth::user()->id),
                        ],
            'password' => 'required|string|confirmed|min:8|max:255',
            'login' => ['required',
                        'string',
                        'max:30',
                        Rule::unique('users')->ignore(Auth::user()->id),
                        ],
            'firstname' => 'required|string|max:60',
            'lastname' => 'required|string|max:60',
            'langue' => 'required|string|max:2',
        ]);

        Auth::user()->email = $request->email;
        Auth::user()->password = Hash::make($request->password);
        Auth::user()->login = $request->login;
        Auth::user()->firstname = $request->firstname;
        Auth::user()->lastname = $request->lastname;
        Auth::user()->langue = $request->langue;

        auth::user()->save();

        return redirect(RouteServiceProvider::HOME);
    }
}
