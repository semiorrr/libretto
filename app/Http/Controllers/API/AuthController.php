<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
{
    $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    $user = User::where('username', $request->username)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'username' => ['Invalid credentials.'],
        ]);
    }

    $expirationMinutes = config('sanctum.expiration');
    $validFrom = now()->subMinutes($expirationMinutes);

    $existingToken = $user->tokens()
        ->where('name', 'libretto_token')
        ->where('created_at', '>=', $validFrom)
        ->first();

    if ($existingToken) {
        return response()->json([
            'message' => 'Using existing valid token',
            'token' => $existingToken->token,
            'expires_at' => $existingToken->created_at->addMinutes($expirationMinutes)->toDateTimeString(),
            'user' => $user,
        ]);
    }

    $user->tokens()->where('name', 'libretto_token')->delete();

    $newToken = $user->createToken('libretto_token');

    return response()->json([
        'message' => 'New token generated',
        'token' => $newToken->plainTextToken,
        'expires_at' => now()->addMinutes($expirationMinutes)->toDateTimeString(),
        'user' => $user,
    ]);
}



    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logged out successfully'
        ]);
    }
}
