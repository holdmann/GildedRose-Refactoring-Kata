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