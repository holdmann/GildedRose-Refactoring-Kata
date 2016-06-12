<?php

/**
 * Created by PhpStorm.
 * User: holdmann
 * Date: 12.06.16
 * Time: 18:43
 */
class ConjuredManaCake
{
    protected $_item = null;

    public function __construct(\Item $item)
    {
        $this->_item = $item;
    }

    protected function updateSellIn()
    {
        $this->_item->sellIn -= 1;
    }

    protected function updateQuality()
    {
        $qualityDecreaseBy = 2;

        $this->_item->quality -= $qualityDecreaseBy;

        if ($this->_item->quality < 0)
            $this->_item->quality = 0;
    }

    public function update()
    {
        $this->updateQuality();
        $this->updateSellIn();
    }
}
