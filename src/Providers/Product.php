<?php


namespace App\PriceStrategy\Providers;


class Product
{
    protected $productId;

    public function __construct($productId = null)
    {
        $this->productId = $productId;
    }

    /**
     * @return mixed|null
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param mixed|null $productId
     */
    public function setProductId($productId): void
    {
        $this->productId = $productId;
    }

}