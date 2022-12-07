<?php

namespace Gloversure\Store;

/**
 * Holds information about the users' current basket
 * Calculates the total for the basket
 * 
 * @package \Gloversure\Store
 */
class Basket
{
    /**
     * @var float                 $total    total price of the basket
     * @var Array<Basket\Product> $products all products currently in the basket
     */
    public float $total = 0;
    private Array $products = [];

    private $promo=false;

    private $fix_promo = false;

    private $fix_price = 0;

    private $promo_sku = '';


    public function __construct($rules= null){
      

        if($rules!=null){
            print "create with rules";

            $arr = explode (",", $rules);

            if($arr[1]==2){
                print " buy1 frre 1 rule apply";
                $this->promo = true;
            }

            if($arr[2]>0){

                print " Fix price promo rule";

                $this->fix_promo = true;
                $this->fix_price = $arr[2];
            }

            if($arr[3]!=''){

                $this->promo_sku=$arr[3];
            }




        }else{

            print "create with no rules";
        }
    }

    /**
     * Adds a product to the basket
     * Should update the 
     *
     * @param \Gloversure\Store\Product $product  product to add to the basket
     * @param int                       $quantity number of products to add to the basket
     * 
     * @return void
     */
    public function addItems(Product $product, int $quantity = 0): void
    {
        if (isset($this->products[$product->sku]))
            $this->products[$product->sku]->quantity += $quantity;
        else {
            $newProduct = new Basket\Product(
                $product,
                $quantity,
            );

            $this->products[$product->sku] = $newProduct;
        }

        $this->calculateTotal();
    }

    /**
     * Calculates the total for the basket
     * 
     * @return void
     */
    protected function calculateTotal(): void
    {
        $this->total = 0;
        /** @var Basket\Product $product */
        foreach ($this->products as $product) {
           

            if($this->promo){

                print "prodct details \n";

                // var_dump($product);

                if($product->product->sku==$this->promo_sku){

                    $this->total += ($product->product->price * $product->quantity)/2;
                }else{

                    $this->total += $product->product->price * $product->quantity;
                }
            }else{

                if($this->fix_promo){

                    if($product->quantity>4){

                        $this->total = $this->fix_price * $product->quantity;

                    }
                }else{

                    $this->total += $product->product->price * $product->quantity;
                }
                
            }
        }


    }

    public function print_basket(): void 
    {

        foreach ($this->products as $product) {

            print " Product sku: " . $product->product->sku . "product name : " . $product->product->name . "Product Quntity : " . $product->quantity . "item price : " . $product->price;


        }


    }
}