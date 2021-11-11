<?php


namespace App\Repository;


use App\Models\Adress;
use App\Models\User;

class UserRepository
{
    public function register(array $data) : User
    {
        $user = new User($data);

        $user->fill($data);
        $user->password = bcrypt($data['password']);
        $user->save();

        $adress = $this->addAdress($user, $data);

        return $user;
    }

    public function addAdress(User $user,array $data) :Adress
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
