<?php

namespace Gloversure\Store;

class Rules{

    protected $miimum_items;
    protected $free_itms_ratio;

    protected $fix_rate;

    protected $product_code;

    public function __construct($mini=1,$ratio=1,$fix_rate=0,$product_code=''){

        $this->miimum_items = $mini;
        $this->free_itms_ratio=$ratio;
        $this->fix_rate = $fix_rate;
        $this->product_code = $product_code;


    }

    public function get_rule(){

        return $this->miimum_items.','.$this->free_itms_ratio.','.$this->fix_rate .','.$this->product_code;
    }

}