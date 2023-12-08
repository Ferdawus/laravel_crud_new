<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Http\Resources\User\AuthResource;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $request){
        $user = User::where('phone', $request->phone)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        return $this->makeToken($user);

    }
    public function register(RegisterRequest $request){
        $user = User::create([
            'name'     => $request->input('name'),
            'email'    => $request->input('email'),
            'phone'    => $request->input('phone'),
            'password' => bcrypt($request->input('password')),
        ]);

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        return $this->makeToken($user);

    }

    public function makeToken($user){
        $token = $user->createToken('user-token')->plainTextToken;
        // return AuthResource::make($user);
        return (new AuthResource($user))
                ->additional(['meta' => [
                    'token'      => $token,
                    'token_type' => 'Bearer',
                ]]);

    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();
        return send_ms('User logout',true,200);
    }
}
