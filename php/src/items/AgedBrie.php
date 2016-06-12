<?php

/**
 * Created by PhpStorm.
 * User: holdmann
 * Date: 12.06.16
 * Time: 17:58
 */
class AgedBrie extends BaseItem {
    
    protected function updateSellIn()
    {
        $this->_item->sellIn -= 1;
    }
    
    protected function updateQuality()
    {
        $qualityIncreaseBy = $this->_item->sellIn > 0 ? 1 : 2;

        if ($this->_item->sellIn < 0)
            $qualityIncreaseBy = 2;

        $this->_item->quality += $qualityIncreaseBy;

        if ($this->_item->quality > 50)
            $this->_item->quality = 50;
    }
}










