<?php

namespace Gloversure\Store;

final class Store
{
    /**
     * @var array<Product> $products
     */
    private $products = [];

    public function __construct(string $storeXml)
    {
        if (!file_exists($storeXml))
            throw new Exception\FileNotFoundException("Store XML \"{$storeXml}\" doesn't exist");

        $contents = file_get_contents($storeXml);
        $xml = new \SimpleXMLElement($contents);

        $this->products = $this->parseXml($xml);
    }

    /**
     * Get a product from the store
     * 
     * @param string $sku
     * 
     * @return Product
     * @throws Exception\ProductNotFoundException
     */
    public function getProduct(string $sku): Product
    {
        if (!isset($this->products[$sku]))
            throw new Exception\ProductNotFoundException("Product with sku \"{$sku}\" doesn't exist");

        return $this->products[$sku];
    }

    /**
     * Turns the store XML into an array of products
     * 
     * @param \SimpleXmlElement $xml
     * 
     * @return array<Product>
     */
    private function parseXml(\SimpleXMLElement $xml): array
    {
        /**
         * @var array<Product> $products
         * @var array<int> $inventory associated array of sku to amount in stock
         */
        $products = [];
        $inventory = $this->getProductInventory($xml);

        $index = 0;
        foreach ($xml->products->product as $product) {
            $attrs = $product->attributes();

            $sku = (string) $attrs['sku'];
            $name = (string) $attrs['name'];
            $price = (float) $attrs['price'];

            try {
                $products[$sku] = new Product(
                    $sku,
                    $name,
                    $price,
                    $inventory[$sku] ?? 0
                );
            } catch (Exception\BadProductException $e) {
                throw new Exception\BadProductException(
                    "Product with index {$index} does not contain all required information"
                );
            }

            $index += 1;
        }
        return $products;
    }

    private function getProductInventory($xml): array
    {
        return [];
    }
}