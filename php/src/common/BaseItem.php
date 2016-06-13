<?php

/**
 * Created by PhpStorm.
 * User: holdmann
 * Date: 12.06.16
 * Time: 18:52
 */
abstract class BaseItem
{
    /**
     * Used as proxy of original item.
     * 
     * @var Item|null
     */
    protected $_item = null;

    /**
     * BaseItem constructor.
     * Set item and store them in $_item property.
     * 
     * @param Item $item
     * @throws ItemQualityOutOfRangeException if quality is incorrect.
     */
    public function __construct(\Item $item)
    {
        if ($item->quality < 0)
            throw new ItemQualityOutOfRangeException("Quality of item can not be negative");

        if ($item->quality > 50)
            throw new ItemQualityOutOfRangeException("Quality of item can not be more that 50");

        $this->_item = $item;
    }

    /**
     * Abstract method that calculates sellIn value of item.
     */
    abstract protected function updateSellIn();
    
    /**
     * Abstract method that calculates quality value of item.
     */
    abstract protected function updateQuality();

    /**
     * Bridge method used for update both sellIn and quality values.
     */
    public function update()
    {
        $this->updateQuality();
        $this->updateSellIn();
    }
}