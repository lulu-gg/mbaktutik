<?php

namespace App\Http\Controllers\Api;

// use App\Helpers\RoleHelpers;

use App\Helpers\ApiHelpers;
use App\Helpers\JWTHelpers;
use App\Helpers\RoleHelpers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (!Auth::attempt($credentials)) return ApiHelpers::responseData([], message: 'Kombinasi Password Salah');

            $loggedUser = Auth::user();
            $user = User::where(['id' => $loggedUser->id])->with(['role', 'driver'])->firstOrFail();
            $token = JWTHelpers::encode(['user' => $user]);

            return response()->json(['user' => $user, 'token' => $token]);
        } catch (ValidationException $e) {
            return ApiHelpers::responseInvalidValidate($e);
        } catch (\Exception $e) {
            return ApiHelpers::responseError($e);
        }
    }
}
