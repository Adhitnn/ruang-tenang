<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'gender' => ['required', 'in:male,female'], 
            'birthdate' => ['required', 'date'], 
        ]);

        // Convert email to lowercase (optional)
        $email = strtolower($request->email);

        $user = User::create([
            'name' => $request->name,
            'email' => $email,  // Simpan email dalam lowercase
            'password' => Hash::make($request->password),
            'gender' => $request->gender, 
            'birthdate' => $request->birthdate, 
        ]);

        event(new Registered($user));

        Auth::login($user);

        // Redirect to dashboard after successful registration
        return redirect('/home');
    }
}
