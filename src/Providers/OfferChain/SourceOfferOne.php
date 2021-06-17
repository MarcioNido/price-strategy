<?php


namespace App\PriceStrategy\Providers\OfferChain;


use App\PriceStrategy\Providers\PriceProvider\PriceNotFoundException;
use App\PriceStrategy\Providers\Product;
use App\PriceStrategy\Providers\User\User;

class SourceOfferOne extends SourceChain
{
    /**
     * @throws PriceNotFoundException
     */
    public function getOffer(Product $product, User $user): float
    {
        if ($user->userId === 1) {
            return 1;
        }

        return $this->next($product, $user);
    }
}