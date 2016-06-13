<?php

/**
 * Created by PhpStorm.
 * User: holdmann
 * Date: 12.06.16
 * Time: 17:49
 */
class Item {

    /**
     * @var string Name of item.
     */
    public $name;

    /**
     * @var int Number of dates before item will be out-to-date. Can be negative.
     */
    public $sellIn;

    /**
     * @var int Current quality of item. Never can not be negative.
     */
    public $quality;

    /**
     * Item constructor.
     * Set properties to current item.
     *
     * @param $name
     * @param $sellIn
     * @param $quality
     */
    function __construct($name, $sellIn, $quality) {
        $this->name = $name;
        $this->sellIn = $sellIn;
        $this->quality = $quality;
    }

    /**
     * Prints the item properties.
     *
     * @return string
     */
    public function __toString() {
        return "{$this->name}, {$this->sellIn}, {$this->quality}";
    }
}