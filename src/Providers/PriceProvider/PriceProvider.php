<?php


namespace App\PriceStrategy\Providers\PriceProvider;


use App\PriceStrategy\Providers\Product;
use App\PriceStrategy\Providers\User\User;

class PriceProvider
{
    protected $user;
    protected $offer;
    protected $defaultPriceProvider;

    public function __construct(OfferInterface $offer, DefaultPriceProvider $defaultPriceProvider)
    {
        $this->offer = $offer;
        $this->defaultPriceProvider = $defaultPriceProvider;
    }

    public function getPrice(Product $product, User $user): float
    {
        $price = $this->offer->getOffer($product, $user);
        if (! $price) {
            $price = $this->defaultPriceProvider->getPrice($product);
        }
        return $price;
    }
}