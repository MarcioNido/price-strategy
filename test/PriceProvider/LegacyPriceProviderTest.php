<?php

namespace App\PriceStrategy\Providers\User\PriceProvider;

use App\PriceStrategy\Providers\PriceProvider\PriceNotFoundException;
use App\PriceStrategy\Providers\PriceProvider\PriceProvider;
use App\PriceStrategy\Providers\Product;
use App\PriceStrategy\Providers\User\User;
use PHPUnit\Framework\TestCase;

class LegacyPriceProviderTest extends TestCase
{
    /** @var PriceProvider */
    private $SUT;

    public function setUp(): void
    {
        parent::setUp();
        $container = require __DIR__ . '/../../src/ServiceContainer/container.php';
        $this->SUT = $container->get('price.provider.legacy');
    }

    public function testGetPriceForUserWithOfferOne()
    {
        $product = new Product(1);
        $user = new User(1);

        $this->assertTrue(true);
        $this->assertEquals(1, $this->SUT->getPrice($product, $user));
    }

    public function testGetPriceForUserWithOfferTwo()
    {
        $product = new Product(1);
        $user = new User(2);

        $this->assertEquals(2.0, $this->SUT->getPrice($product, $user));
    }

    public function testGetPriceForUserWithLegacyOffer()
    {
        $product = new Product(1);
        $user = new User(3);

        $this->assertEquals(3.0, $this->SUT->getPrice($product, $user));
    }

    public function testGetPriceForUserWithoutLegacyOffer()
    {
        $product = new Product(1);
        $user = new User(4);

        $this->assertEquals(10, $this->SUT->getPrice($product, $user));
    }

    public function testGetPriceForInexistentProduct()
    {
        $this->expectExceptionObject(new PriceNotFoundException());
        $product = new Product(11);
        $user = new User(11);

        $this->SUT->getPrice($product, $user);
    }
}
