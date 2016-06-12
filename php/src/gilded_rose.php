<?php

class GildedRose {

    private $items;

    function __construct($items) {
        $this->items = $items;
    }

    function updateQuality() {
        foreach ($this->items as $item) {
            switch ($item->name) {
                case 'Aged Brie':

                    $itemInstance = ItemFactory::model($item);
                    $itemInstance->update();
                    
                    /*
                    $qualityIncreaseBy = $item->sellIn > 0 ? 1 : 2;

                    $item->sellIn -= 1;

                    if ($item->sellIn < 0)
                        $qualityIncreaseBy = 2;

                    $item->quality += $qualityIncreaseBy;

                    if ($item->quality > 50)
                        $item->quality = 50;

                    */

                    break;

                case 'Sulfuras, Hand of Ragnaros':
                    // legendary item, do nothing.
                    break;

                case 'Backstage passes to a TAFKAL80ETC concert':
                    $qualityIncreaseBy = 1;

                    if ($item->sellIn <= 10)
                        $qualityIncreaseBy = 2;
                    if ($item->sellIn <= 5)
                        $qualityIncreaseBy = 3;

                    $item->sellIn -= 1;

                    $item->quality += $qualityIncreaseBy;

                    if ($item->sellIn < 0)
                        $item->quality = 0;

                    if ($item->quality > 50)
                        $item->quality = 50;
                    break;

                case 'Conjured Mana Cake':
                    $qualityDecreaseBy = 2;

                    $item->sellIn -= 1;

                    $item->quality -= $qualityDecreaseBy;

                    if ($item->quality < 0)
                        $item->quality = 0;

                    break;

                default:
                    $qualityDecreaseBy = $item->sellIn > 0 ? 1 : 2;

                    $item->sellIn -= 1;

                    if ($item->sellIn < 0)
                        $qualityDecreaseBy = 2;

                    $item->quality -= $qualityDecreaseBy;

                    if ($item->quality < 0)
                        $item->quality = 0;

                    break;
            }
        }
    }
}

