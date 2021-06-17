<?php

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
    'price.provider' => get(PriceProvider::class)
];