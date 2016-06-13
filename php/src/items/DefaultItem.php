<?php

/**
 * Created by PhpStorm.
 * User: holdmann
 * Date: 12.06.16
 * Time: 18:46
 */
class DefaultItem extends BaseItem {

    /**
     * Decrease sellIn by one point every day.
     */
    protected function updateSellIn()
    {
        $this->_item->sellIn -= 1;
    }

    /**
     * Decrease quality by one or two whether sellIn positive or not.
     */
    protected function updateQuality()
    {
        $qualityDecreaseBy = $this->_item->sellIn > 0 ? 1 : 2;

        if ($this->_item->sellIn < 0)
            $qualityDecreaseBy = 2;

        $this->_item->quality -= $qualityDecreaseBy;

        if ($this->_item->quality < 0)
            $this->_item->quality = 0;
    }
}