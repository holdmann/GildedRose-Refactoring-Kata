<?php

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

