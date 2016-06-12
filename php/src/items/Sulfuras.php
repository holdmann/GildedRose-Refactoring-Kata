<?php

/**
 * Created by PhpStorm.
 * User: holdmann
 * Date: 12.06.16
 * Time: 18:20
 */
class Sulfuras extends BaseItem {

    public function __construct(\Item $item)
    {
        if ($item->quality != 80)
            throw new ItemQualityOutOfRangeException("Quality of Sulfaras item must be 80 in any case");

        $this->_item = $item;
    }
    
    protected function updateSellIn() {}
    
    protected function updateQuality() {}
}