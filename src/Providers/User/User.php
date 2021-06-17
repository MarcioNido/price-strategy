<?php


namespace App\PriceStrategy\Providers\User;


class User
{
    public $userId;

    public function __construct(int $userId)
    {
        $this->userId = $userId;
    }
}