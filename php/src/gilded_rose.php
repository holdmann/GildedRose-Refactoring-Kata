<?php

class GildedRose {

    private $items;

    function __construct($items) {
        $this->items = $items;
    }

    function updateQuality() {
        foreach ($this->items as $item) {
            if (in_array($item->name, ['Aged Brie', 'Sulfuras, Hand of Ragnaros', 'Backstage passes to a TAFKAL80ETC concert'])) {
                switch ($item->name) {
                    case 'Aged Brie':
                        $qualityIncreaseBy = $item->sellIn > 0 ? 1 : 2;

                        $item->sellIn -= 1;

                        if ($item->sellIn < 0)
                            $qualityIncreaseBy = 2;

                        $item->quality += $qualityIncreaseBy;

                        if ($item->quality > 50)
                            $item->quality = 50;

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

                    default: break;
                }
                // terminate method execution.
                return;
            }

            if ($item->name != 'Aged Brie' and $item->name != 'Backstage passes to a TAFKAL80ETC concert') {
                if ($item->quality > 0) {
                    if ($item->name != 'Sulfuras, Hand of Ragnaros') {
                        $item->quality = $item->quality - 1;
                    }
                }
            } else {
                if ($item->quality < 50) {
                    $item->quality = $item->quality + 1;
                    if ($item->name == 'Backstage passes to a TAFKAL80ETC concert') {
                        if ($item->sellIn < 11) {
                            if ($item->quality < 50) {
                                $item->quality = $item->quality + 1;
                            }
                        }
                        if ($item->sellIn < 6) {
                            if ($item->quality < 50) {
                                $item->quality = $item->quality + 1;
                            }
                        }
                    }
                }
            }
            
            if ($item->name != 'Sulfuras, Hand of Ragnaros') {
                $item->sellIn = $item->sellIn - 1;
            }
            
            if ($item->sellIn < 0) {
                if ($item->name != 'Aged Brie') {
                    if ($item->name != 'Backstage passes to a TAFKAL80ETC concert') {
                        if ($item->quality > 0) {
                            if ($item->name != 'Sulfuras, Hand of Ragnaros') {
                                $item->quality = $item->quality - 1;
                            }
                        }
                    } else {
                        $item->quality = $item->quality - $item->quality;
                    }
                } else {
                    if ($item->quality < 50) {
                        $item->quality = $item->quality + 1;
                    }
                }
            }
        }
    }
}

class Item {

    public $name;
    public $sellIn;
    public $quality;

    function __construct($name, $sellIn, $quality) {
        $this->name = $name;
        $this->sellIn = $sellIn;
        $this->quality = $quality;
    }

    public function __toString() {
        return "{$this->name}, {$this->sellIn}, {$this->quality}";
    }

}

