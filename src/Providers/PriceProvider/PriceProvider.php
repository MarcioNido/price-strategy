<?php


namespace App\PriceStrategy\Providers\PriceProvider;


use App\PriceStrategy\Providers\Product;
use App\PriceStrategy\Providers\User\User;

class PriceProvider
{
    protected $user;
    protected $offer;

    public function __construct(OfferInterface $offer)
    {
        $this->offer = $offer;
    }

    public function getPrice(Product $product, User $user): float
    {
        return $this->offer->getOffer($product, $user);
    }
}