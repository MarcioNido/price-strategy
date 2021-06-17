<?php
include './vendor/autoload.php';

use App\PriceStrategy\Providers\PriceProvider\PriceProvider;
use App\PriceStrategy\Providers\Product;
use App\PriceStrategy\Providers\User\User;

$container = require __DIR__ . '/src/ServiceContainer/container.php';

$product = new Product(1);
$user = new User(1);

/** @var PriceProvider $priceProvider */
$priceProvider = $container->get('price.provider');
echo "Price found: " . $priceProvider->getPrice($product, $user);