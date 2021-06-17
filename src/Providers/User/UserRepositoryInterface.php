<?php


namespace App\PriceStrategy\Providers\User;


interface UserRepositoryInterface
{
    public function find(int $id): User;
}
