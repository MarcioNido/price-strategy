<?php

namespace App\PriceStrategy\Providers\User\PriceProvider;

use App\PriceStrategy\Providers\PriceProvider\PriceProvider;
use App\PriceStrategy\Providers\Product;
use App\PriceStrategy\Providers\User\User;
use PHPUnit\Framework\TestCase;

class PriceProviderTest extends TestCase
{
    /** @var PriceProvider */
    private $SUT;
    private $container;

    public function setUp(): void
    {
        parent::setUp();
        $this->container = require __DIR__ . '/../../src/ServiceContainer/container.php';

        $this->SUT = $this->container->get('price.provider');
    }

    public function testGetPriceForUserWithOffer()
    {
        $product = new Product(1);
        $user = new User(1);

        $this->assertTrue(true);
        $this->assertEquals(9.0, $this->SUT->getPrice($product, $user));
    }

    public function testGetPriceForUserWithoutOffer()
    {
        $product = new Product(1);
        $user = new User(2);

        $this->assertEquals(10.0, $this->SUT->getPrice($product, $user));
    }

}
