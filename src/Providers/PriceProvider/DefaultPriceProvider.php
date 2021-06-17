<?php


namespace App\PriceStrategy\Providers\PriceProvider;


use App\PriceStrategy\Providers\Product;

class DefaultPriceProvider
{
    public function getPrice(Product $product): float
    {
        return 10.0;
    }
}