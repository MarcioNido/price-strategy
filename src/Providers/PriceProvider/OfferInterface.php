<?php


namespace App\PriceStrategy\Providers\PriceProvider;


use App\PriceStrategy\Providers\Product;
use App\PriceStrategy\Providers\User\User;

interface OfferInterface
{
    public function getOffer(Product $product, User $user): ?float;
}