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

    private $items;

    function __construct($items) {
        $this->items = $items;
    }

    function updateQuality() {
        foreach ($this->items as $item) {
            $itemInstance = ItemFactory::model($item);
            $itemInstance->update();
        }
    }
}

