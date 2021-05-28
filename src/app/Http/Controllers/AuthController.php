<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;

class AuthController extends Controller
{
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){
        $ps_user = \PsApi::FetchPsUserAuth(["email" => $request->email, "password" => $request->password]);
        if($ps_user == null){
            return response()->json(['error' => 'invalid credentials'], 401);
        }
        $user = $this->updatePsUserIntoSystem($ps_user);
        if (!$token = auth()->login($user)) {
            return response()->json(['error' => 'invalid credentials'], 401);
        }
        return $this->createNewToken($token);
    }
    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout() {
        auth()->logout();

        return response()->json(['message' => 'User successfully signed out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile() {
        return response()->json(auth()->user());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token){
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }
    protected function updatePsUserIntoSystem($ps_user){
        $user = User::where('email','=',data_get($ps_user, "user.email"))->first();
        if($user == null){
            $user = User::create([
                'photo_spot_user_id' => data_get($ps_user, "user.id"),
                'last_name' => data_get($ps_user, "user.name_sei"),
                'first_name' => data_get($ps_user, "user.name_mei"),
                'last_name_furigana' => data_get($ps_user, "user.name_kana_sei"),
                'first_name_furigana' => data_get($ps_user, "user.name_kana_mei"),
                'email' => data_get($ps_user, "user.email")
            ]);
        } else {
            // update
        }
        return $user;
    }
}
