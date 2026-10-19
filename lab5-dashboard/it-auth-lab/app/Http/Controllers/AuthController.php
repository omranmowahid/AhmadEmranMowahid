<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
    ]);
    // TODO: create a User and set name, email, password.
    $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
    ]);
    // TODO: save the user and redirect to the login page.
    return redirect()->route('login')->with('success', 'Account created successfully, you can log in');
    }

    public function login(Request $request)
    {
    // TODO: validate email and password into $credentials.
    $credentials = $request->validate([
        'email'    => 'required|email',
        'password' => 'required|string',
    ]);
    $accepted = Auth::attempt($credentials);
    if (! $accepted) {
    return back()->withErrors(['email' => 'Email or password is incorrect.'])->onlyInput('email');
    }

    $request->session()->regenerate();
    return redirect()->intended(route('dashboard'));
    
    }

    public function logout(Request $request)
    {
    // TODO: complete using page 5.
    
    }
}