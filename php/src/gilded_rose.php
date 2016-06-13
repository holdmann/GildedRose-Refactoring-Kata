<?php

require_once 'Item.php';
require_once 'common/ItemFactory.php';
require_once 'common/BaseItem.php';
require_once 'exception/GildedRoseException.php';
require_once 'exception/ItemQualityOutOfRangeException.php';
require_once 'items/AgedBrie.php';
require_once 'items/Sulfuras.php';
require_once 'items/BackstagePass.php';
require_once 'items/ConjuredManaCake.php';
require_once 'items/DefaultItem.php';

class GildedRose {

    /**
     * @var Item[] Property used for storing $items passed in constructor.  
     */
    private $items;

    /**
     * GildedRose constructor.
     * Set items and store them in $items property.
     * 
     * @param $items Item[] Array of items. 
     */
    function __construct($items) {
        $this->items = $items;
    }

    /**
     * Iterate over all items and update sellIn & quality properties.
     */
    function updateQuality() {
        foreach ($this->items as $item) {
            $itemInstance = ItemFactory::model($item);
            $itemInstance->update();
        }
    }
}

