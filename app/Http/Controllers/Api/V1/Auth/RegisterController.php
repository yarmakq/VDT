<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\Adress;
use App\Models\User;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function register(UserRegisterRequest $request)
    {
        $validated = $request->validated();

        $user = User::where('email', $validated['email'])->first();

        if (!isset($user)) {
            $user = $this->registration($request->validated());

            return response()->json(['data' => ['user' => UserResource::make($user)]]);
        }


        if ($validated->any()) {
            foreach ($validated->all() as $error) {
                return response()->json(['errors' => ['error' => $error]]);
            }
        }
    }

    private function registration(array $data) : User
    {
        $user = new User($data);

        $user->fill($data);
        $user->password = bcrypt($data['password']);
        $user->save();

        $address = $this->addAddress($user, $data);

        return $user;
    }

    private function addAddress(User $user,array $data) :Adress
    {
        $adress = new Adress($data);

        $adress->user()->associate($user);
        $adress->city = $data['city'];
        $adress->street = $data['street'];
        $adress->house = $data['house'];
        $adress->num_apartment = $data['num_apartment'];
        $adress->entrance = $data['entrance'];
        $adress->save();

        return $adress;
    }
}
