<?php

class GildedRose {

    private $items;

    function __construct($items) {
        $this->items = $items;
    }

    function updateQuality() {
        foreach ($this->items as $item) {
            switch ($item->name) {
                default:

                    $itemInstance = ItemFactory::model($item);
                    $itemInstance->update();

                    break;
            }
        }
    }
}

