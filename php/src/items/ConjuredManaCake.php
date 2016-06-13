<?php

/**
 * Created by PhpStorm.
 * User: holdmann
 * Date: 12.06.16
 * Time: 18:43
 */
class ConjuredManaCake extends BaseItem {

    /**
     * Decrease sellIn by one point every day.
     */
    protected function updateSellIn()
    {
        $this->_item->sellIn -= 1;
    }

    /**
     * Decrease quality by two but not less to zero.
     */
    protected function updateQuality()
    {
        $qualityDecreaseBy = 2;

        $this->_item->quality -= $qualityDecreaseBy;

        if ($this->_item->quality < 0)
            $this->_item->quality = 0;
    }
}
