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
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'image'=> "required|image|mimes:png,jpg,jpeg,gif,svg,webp|max:2048",
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        //enregister l'image dans le dossier images_users
        $request->file("image")->storePublicly('images_users/', 'public');
        // enregister l'user dans la database
        $user = User::create([
            'name' => $request->name,
            'image' => $request->file("image")->hashName(),
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ])->assignRole('jury');

        event(new Registered($user));

        Auth::login($user);

        return redirect()->back()->with('success','Jury has been added successfully');
    }
}
