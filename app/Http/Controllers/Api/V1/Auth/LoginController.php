<?php

namespace App\Http\Controllers\Api\V1\Auth;


use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Models\Adress;
use Auth;

class LoginController extends Controller
{
    public function login(UserLoginRequest $request)
    {
        $validated = $request->validated();

        if (isset($validated)) {
            if (! $token = auth()->attempt($request->validated())) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
        } else
            {
                if ($validated->any()) {
                    foreach ($validated->all() as $error) {
                        return response()->json(['errors' => ['error' => $error]]);
                }
            }
        }

        return $this->createNewToken($token);
    }

    protected function createNewToken($token) {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'info' => [
                'user' => auth()->user(),
                'address' => Adress::where('user_id', Auth::user()->id)->first()
            ],
        ]);
    }
}
