<?php


namespace App\PriceStrategy\Providers\User;


class UserRepository implements UserRepositoryInterface
{
    public function find(int $id): User
    {
        return new User($id);
    }
}