<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
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
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users','regex:/utad|aautad/'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        /** @var \App\Models\User $user */
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $token = $user->createToken('main')->plainTextToken;

        /** Return to this later, users shouldn't login automatically */
        return response([
            'user' => $user,
            'token' => $token
        ]);
    }

    public function login(Request $request) 
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email', 'exists:users,email'],
            'password' => ['required'],
            'remember' => ['boolean'],
        ]);
        $remember = $credentials['remember'] ?? false;
        unset($credentials['remember']);

        if (!Auth::attempt($credentials, $remember)) {
            return response([
                'error' => 'Credenciais inválidas. Tenta novamente.'
            ], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('main')->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token
        ]);
    }

    public function logout() 
    {
        /** @var User $user */
        $user = Auth::user();

        $user->currentAccessToken()->delete();

        return response([
            'success' => true
        ]);
    }
}