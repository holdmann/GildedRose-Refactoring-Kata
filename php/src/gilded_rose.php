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
                case 'Sulfuras, Hand of Ragnaros':
                case 'Backstage passes to a TAFKAL80ETC concert':

                    $itemInstance = ItemFactory::model($item);
                    $itemInstance->update();

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

