<?php


namespace App\PriceStrategy\Providers\OfferChain;


use App\PriceStrategy\Providers\PriceProvider\PriceNotFoundException;
use App\PriceStrategy\Providers\Product;
use App\PriceStrategy\Providers\User\User;

abstract class SourceChain
{
    /** @var SourceChain */
    protected $successor;

    abstract public function getOffer(Product $product, User $user): float;

    /**
     * @throws PriceNotFoundException
     */
    public function next(Product $product, User $user): float
    {
        if ($this->successor) {
            return $this->successor->getOffer($product, $user);
        }

        throw new PriceNotFoundException();
    }

    public function setSuccessor(SourceChain $source)
    {
        $this->successor = $source;
    }
}