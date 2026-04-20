<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function index() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()
                ->route('login')
                ->with('error', 'User not found.');
        }

        if ($user->is_deleted == 1) {
            return redirect()
                ->route('login')
                ->with('error', 'Your account has been deleted. Please contact admin.');
        }

        if ($user->is_approved == 0) {
            return redirect()
                ->route('login')
                ->with('error', 'Your account is not approved yet.');
        }

        $credentials = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
            return back()
            ->with('error','Invalid email or password');
        }

        session(['jwt_token'=>$token]);

        return redirect()
            ->route('admin.index')
            ->with('success', 'Logged in successfully');
    }

    public function me()
    {
        return response()->json(auth()->user());
    }

    public function logout() {
        $token = session('jwt_token');

        if ($token) {
            JWTAuth::setToken($token)->invalidate();
        }

        session()->forget('jwt_token');

        return redirect()->route('login');
    }

    public function register(Request $request) {

        $rules = [
            'name'      => 'required|min:3',
            'email'     => 'required|email|unique:users,email',
            'phone'     => 'required|min:10',
            'password'  => 'required|min:8|confirmed'
        ];

        $message = [
            'name.required' => 'Please enter your name.',
            'name.min' => 'Name must be at least 3 characters.',

            'email.required' => 'Email is required.',
            'email.email' => 'Enter a valid email address.',
            'email.unique' => 'This email is already registered.',

            'phone.required' => 'Phone number is required.',

            'password.required' => 'Password cannot be empty.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.confirmed' => 'Password and confirm password must match.'
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails()) {
            return redirect()
            ->route('login')
            ->withInput()
            ->withErrors($validator);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        $token = JWTAuth::fromUser($user);

        return redirect()
        ->route('login')
        ->with('success','Successfully registerd');

    }
}