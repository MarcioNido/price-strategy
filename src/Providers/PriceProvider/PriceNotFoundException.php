<?php


namespace App\PriceStrategy\Providers\PriceProvider;


class PriceNotFoundException extends \Exception
{
    protected $message = "Price not found";
    protected $code = 404;
}