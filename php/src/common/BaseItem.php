<?php

/**
 * Created by PhpStorm.
 * User: holdmann
 * Date: 12.06.16
 * Time: 18:52
 */
abstract class BaseItem
{
    protected $_item = null;

    public function __construct(\Item $item)
    {
        if ($item->quality < 0)
            throw new ItemQualityOutOfRangeException("Quality of item can not be negative");

        if ($item->quality > 50)
            throw new ItemQualityOutOfRangeException("Quality of item can not be more that 50");

        $this->_item = $item;
    }

    abstract protected function updateSellIn();

    abstract protected function updateQuality();

    public function update()
    {
        $this->updateQuality();
        $this->updateSellIn();
    }
}