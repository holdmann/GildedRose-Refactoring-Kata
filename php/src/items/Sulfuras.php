<?php

/**
 * Created by PhpStorm.
 * User: holdmann
 * Date: 12.06.16
 * Time: 18:20
 */
class Sulfuras extends BaseItem {

    /**
     * Sulfuras constructor.
     * Set item and store them in $_item property.
     *
     * @param Item $item
     * @throws ItemQualityOutOfRangeException if qulity differs from 50.
     */
    public function __construct(\Item $item)
    {
        if ($item->quality != 80)
            throw new ItemQualityOutOfRangeException("Quality of Sulfaras item must be 80 in any case");

        $this->_item = $item;
    }

    /**
     * Do nothing with sellIn of legendary item.
     */
    protected function updateSellIn() {}

    /**
     * Do nothing with quality of legendary item.
     */
    protected function updateQuality() {}
}