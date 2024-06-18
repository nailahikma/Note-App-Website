<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\MessageHelper;
use App\Helpers\FormatHelper;
use App\Http\Controllers\Controller;
use App\Models\Guest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthApiController extends Controller
{
    public function login(Request $request)
    {

        $loginData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = \App\Models\User::where('email', $request->email)->first();

        if (!$user) {
            return response([
                'message' => ['Email not found'],
            ], 404);
        }

        if (!Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['Password is wrong'],
            ], 404);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token,
        ], 200);
    }
    public function register(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        if ($validasi->fails()) {
            $valIndex = $validasi->errors()->all();
            return MessageHelper::error(false, $valIndex[0]);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password,),
        ]);

        $detail = FormatHelper::resultUser($user->id);
        $token = $user->createToken('auth_token')->plainTextToken;


        $msg = "Berhasil Register";
        return MessageHelper::resultAuth(true, $msg, $detail, 200, $token);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Logout success',
        ]);
    }
}
