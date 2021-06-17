<?php


use App\PriceStrategy\Providers\PriceProvider\PriceProvider;

$productId = 1;
$priceProvider = new PriceProvider();
$priceProvider->getPrice($productId);