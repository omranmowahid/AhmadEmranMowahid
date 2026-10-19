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
    // TODO: save the user and redirect to the login page.
    }

    public function login(Request $request)
    {
    // TODO: complete using page 5.
    }
    
    public function logout(Request $request)
    {
    // TODO: complete using page 5.
    }
}