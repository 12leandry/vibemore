<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

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
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'tel' => 'sometimes|string|max:255|unique:users,mobile',
            'profile' => 'required|image|mimes:png,jpg,jpeg|max:1024',
            'gender' => 'required',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $profile = "";


        if ($request->file("profile")) {
            $profile = $request->file("profile")->store("profiles", "public");
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->tel,
            'gender' => $request->gender,
            'profile' => $profile,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        auth()->user()->sendEmailVerificationNotification();
        return redirect(RouteServiceProvider::VERIFY)->with('status', 'verification-link-sent');




    }
}
