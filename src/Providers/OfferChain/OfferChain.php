<?php


namespace App\PriceStrategy\Providers\OfferChain;


use App\PriceStrategy\Providers\PriceProvider\OfferInterface;
use App\PriceStrategy\Providers\Product;
use App\PriceStrategy\Providers\User\User;

class OfferChain implements OfferInterface
{
    private $source;

    public function __construct(SourceChain $source)
    {
        $this->source = $source;
    }

    public function getOffer(Product $product, User $user): ?float
    {
        return $this->source->getOffer($product, $user);
    }
}