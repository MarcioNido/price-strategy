<?php


namespace App\PriceStrategy\Providers\User\PriceProvider;


use App\PriceStrategy\Providers\PriceProvider\PriceProvider;
use App\PriceStrategy\Providers\Product;
use App\PriceStrategy\Providers\User\User;
use PHPUnit\Framework\TestCase;

class ECommercePriceProviderTest extends TestCase
{
    /** @var PriceProvider */
    private $SUT;

    public function setUp(): void
    {
        parent::setUp();
        $container = require __DIR__ . '/../../src/ServiceContainer/container.php';
        $this->SUT = $container->get('price.provider.ecommerce');
    }

    public function testGetPriceForUserWithECommerceOffer()
    {
        $product = new Product(1);
        $user = new User(4);

        $this->assertEquals(4.0, $this->SUT->getPrice($product, $user));
    }

    public function testGetPriceForUserWithoutLegacyOffer()
    {
        $product = new Product(1);
        $user = new User(3);

        $this->assertEquals(10, $this->SUT->getPrice($product, $user));
    }

}