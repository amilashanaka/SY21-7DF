<?php

namespace Gloversure\Store;

class Rules{

    protected $miimum_items;
    protected $free_itms_ratio;

    protected $fix_rate;

    public function __construct($mini=1,$ratio=1,$fix_rate="no"){

        $this->miimum_items = $mini;
        $this->free_itms_ratio=$ratio;
        $this->fix_rate = $fix_rate;


    }

    public function get_rule(){

        return $this->miimum_items.','.$this->free_itms_ratio.','.$this->fix_rate;
    }

}