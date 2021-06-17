<?php


namespace App\PriceStrategy\Providers\PriceProvider;


use App\PriceStrategy\Providers\Product;
use App\PriceStrategy\Providers\User\User;

class Offer implements OfferInterface
{

    public function getOffer(Product $product, User $user): ?float
    {
        if ($user->userId === 1) {
            return 9.0;
        }
        return null;
    }
}