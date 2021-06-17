<?php

use App\PriceStrategy\Providers\OfferChain\OfferChain;
use App\PriceStrategy\Providers\OfferChain\SourceDefaultPrice;
use App\PriceStrategy\Providers\OfferChain\SourceECommerceOffer;
use App\PriceStrategy\Providers\OfferChain\SourceLegacyOffer;
use App\PriceStrategy\Providers\OfferChain\SourceOfferOne;
use App\PriceStrategy\Providers\OfferChain\SourceOfferTwo;
use App\PriceStrategy\Providers\PriceProvider\Offer;
use App\PriceStrategy\Providers\PriceProvider\OfferInterface;
use App\PriceStrategy\Providers\PriceProvider\PriceProvider;
use App\PriceStrategy\Providers\User\UserRepository;
use App\PriceStrategy\Providers\User\UserRepositoryInterface;
use function DI\create;
use function DI\get;

return [
    UserRepositoryInterface::class => create(UserRepository::class),
    OfferInterface::class => create(Offer::class),
    'price.provider' => get(PriceProvider::class),

    'price.provider.legacy' => function() {
        $sourceOfferOne = new SourceOfferOne();
        $sourceOfferTwo = new SourceOfferTwo();
        $sourceLegacyOffer = new SourceLegacyOffer();
        $sourceDefaultPrice = new SourceDefaultPrice();
        $sourceOfferOne->setSuccessor($sourceOfferTwo);
        $sourceOfferTwo->setSuccessor($sourceLegacyOffer);
        $sourceLegacyOffer->setSuccessor($sourceDefaultPrice);
        $offerChain = new OfferChain($sourceOfferOne);
        return new PriceProvider($offerChain);
    },

    'price.provider.ecommerce' => function() {
        $sourceOfferOne = new SourceOfferOne();
        $sourceOfferTwo = new SourceOfferTwo();
        $sourceECommerce = new SourceECommerceOffer();
        $sourceDefaultPrice = new SourceDefaultPrice();
        $sourceOfferOne->setSuccessor($sourceOfferTwo);
        $sourceOfferTwo->setSuccessor($sourceECommerce);
        $sourceECommerce->setSuccessor($sourceDefaultPrice);
        $offerChain = new OfferChain($sourceOfferOne);
        return new PriceProvider($offerChain);
    }
];