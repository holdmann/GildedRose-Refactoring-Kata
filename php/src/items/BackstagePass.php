<?php

/**
 * Created by PhpStorm.
 * User: holdmann
 * Date: 12.06.16
 * Time: 18:23
 */
class BackstagePass extends BaseItem {
    
    protected function updateSellIn()
    {
        $this->_item->sellIn -= 1;

        if ($this->_item->sellIn < 0)
            $this->_item->quality = 0;
    }

    protected function updateQuality()
    {
        $qualityIncreaseBy = 1;

        if ($this->_item->sellIn <= 10)
            $qualityIncreaseBy = 2;
        if ($this->_item->sellIn <= 5)
            $qualityIncreaseBy = 3;

        $this->_item->quality += $qualityIncreaseBy;
        
        if ($this->_item->quality > 50)
            $this->_item->quality = 50;
    }
}
